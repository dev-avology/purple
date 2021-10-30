<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory as Category;


class CategoryController extends Controller
{
    private $prodcuts_limit;
    private $productImagesPath;
    private $categoryImagesPath;
    private $artworkImagesPath;
    private $productIsApproved = 1; // Product Must be approved in order to fetch and join with category Data;

    public function __construct()
    {
        $this->prodcuts_limit = config('pagination-limit.products-limit');
        $this->categoryImagesPath = 'file-upload-paths.category-images';
        $this->artworkImagesPath = 'file-upload-paths.artwork';
        $this->productImagesPath = 'file-upload-paths.products';
    }

    public function getAllCategories()
    {
        $allCategories = Category::with([
            'designs' =>
            function ($design) {
                $design->where('is_approved',  $this->productIsApproved);
            },
            'designs.productByOrientation',
        ])
            ->get()
            ->map(function ($category) {
                if (isset($category->designs)) {
                    $category->setRelation('designs', $category->designs->take($this->prodcuts_limit));
                }
                return $category;
            });

        foreach ($allCategories as $key => $category) {
            $allCategories[$key]['image'] = addFullPathToUploadedImage($this->categoryImagesPath, $category['image']);
            unset($allCategories[$key]['category_id']);
            
            $this->filterDesignsOfCategory($allCategories[$key]['designs']);
            //$this->filterProductImages($allCategories[$key]['designs']['productByOrientation']);

        }
        return $allCategories;
    }

    private function filterDesignsOfCategory($designs)
    {
        if ($designs->count()) {

            foreach ($designs as $key => $product) {
                $designs[$key]['art_photo_path'] = addFullPathToUploadedImage($this->artworkImagesPath, $product['art_photo_path']);
            //    // $designs[$key]['productByOrientation']['product_image'] = addFullPathToUploadedImage($this->productImagesPath,  $product['productByOrientation']['product_image']);
            //   echo $product['productByOrientation']['product_image'];
            //   echo "<br/>";
            }
            return $designs;
        }
        return $designs;
    }

    private function filterProductImages($productsArray)
    {
        foreach ($productsArray as $key => $product) {
            $productsArray[$key]['product_image'] = addFullPathToUploadedImage($this->productImagesPath, $product['product_image']);
        }
        return $productsArray;
    }
}