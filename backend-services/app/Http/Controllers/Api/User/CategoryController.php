<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory as Category;


class CategoryController extends Controller
{
    private $prodcuts_limit;
    private $categoryImagesPath;
    private $artworkImagesPath;

    public function __construct()
    {
        $this->prodcuts_limit = config('pagination-limit.products-limit');
        $this->categoryImagesPath = 'file-upload-paths.category-images';
        $this->artworkImagesPath = 'file-upload-paths.artwork';
    }

    public function getAllCategories()
    {
        $allCategories = Category::with('products')->get()->map(function ($category) {
            if (isset($category->products)) {
                $category->setRelation('products', $category->products->take($this->prodcuts_limit));
            }
            return $category;
        });

        foreach ($allCategories as $key => $category) {
            $allCategories[$key]['image'] = addFullPathToUploadedImage($this->categoryImagesPath, $allCategories[$key]['image']);
            unset($allCategories[$key]['category_id']);
            $this->filterProductsOfCategory($allCategories[$key]['products']);
        }
        return $allCategories;
    }

    private function filterProductsOfCategory($products)
    {
        if ($products) {
            foreach ($products as $key => $product) {
                $products[$key]['art_photo_path'] = addFullPathToUploadedImage($this->artworkImagesPath, $products[$key]['art_photo_path']);
            }
            return $products;
        }
        return $products;
    }
}
