<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory as Category;
use Illuminate\Http\Request;
use App\Traits\FilterCategoryData;

class FilterController extends Controller
{
    use FilterCategoryData;

    private $prodcuts_limit;
    private $productImagesPath;
    private $categoryImagesPath;
    private $artworkImagesPath;
    private $productIsApproved = 1; 

    public function __construct()
    {
        $this->prodcuts_limit = config('pagination-limit.products-limit');
        $this->categoryImagesPath = 'file-upload-paths.category-images';
        $this->artworkImagesPath = 'file-upload-paths.artwork';
        $this->productImagesPath = 'file-upload-paths.products';
    }

    public function index(Request $request)
    {   
        $category_id = $request['category_id'];
        $price = $request['price'];
        $art_medium = $request['art_medium'];

        $price_value = 10;

        if ($price == 'medium') {
            $price_value = 100;
        } else {
            $price_value = 10000;
        }

        $allCategories = Category::with([
            'designs' =>
            function ($design) use($price_value, $art_medium) {
                $design->where('is_approved',  $this->productIsApproved);
                $design->where('price', '<=', $price_value);
                $design->whereRaw('FIND_IN_SET("'.$art_medium.'",artwork_media_id)');
            },
            'designs.artist'
        ])
        ->where('id', $category_id)
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
        }
        return $allCategories;
    }
}
