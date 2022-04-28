<?php
  
namespace App\Traits;

use App\Models\ProductSubCategory;
use App\Models\Product;

trait AddProductsToFeaturedProducts {
  
    public function addFeaturedProducts($designs)
    {
        foreach ($designs as $key => $design) {

            
            $product = Product::where([
                'sub_category' => $design['category_id'], 
                'orientation' => $design['orientation'],
            ])->first()->toArray();

            $product['product_image'] = asset(config($this->productImagesPath)).'/'.$product['product_image'];
            $designs[$key]['product'] = $product;
        }
        return $designs;
    }

}