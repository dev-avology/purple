<?php
  
namespace App\Traits;

use App\Models\ProductSubCategory;
use App\Models\Product;

trait FilterCategoryData {
  
    public function filterDesignsOfCategory($designs)
    {
        if ($designs->count()) {   

            foreach ($designs as $key => $product) {

                $designs[$key]['art_photo_path'] = addFullPathToUploadedImage($this->artworkImagesPath, $product['art_photo_path']);
                
                if ($designs[$key]['artist']) {
                    $designs[$key]['artist_name'] = $designs[$key]['artist']['name'];
                }

                $product = Product::where([
                    'sub_category' => $designs[$key]['category_id'], 
                    'orientation' => $designs[$key]['orientation'],
                ])->first()->toArray();

                $designs[$key]['product_by_orientation'] = $product;
                $designs[$key]['product_image_full_path'] = asset(config($this->productImagesPath)).'/'.$product['product_image'];
            }
            return $designs;
        }
        return $designs;
    }

    public function getCategoryIDBySlug($slug)
    {
        return optional(ProductSubCategory::where(['slug' => $slug])->first('id'))->id;
    }
}