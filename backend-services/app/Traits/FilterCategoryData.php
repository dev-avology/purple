<?php
  
namespace App\Traits;
  
trait FilterCategoryData {
  
    public function filterDesignsOfCategory($designs)
    {
        if ($designs->count()) {   

            foreach ($designs as $key => $product) {

                $designs[$key]['art_photo_path'] = addFullPathToUploadedImage($this->artworkImagesPath, $product['art_photo_path']);
                
                if ($designs[$key]['artist']) {
                    $designs[$key]['artist_name'] = $designs[$key]['artist']['name'];
                }

                if ($designs[$key]['productByOrientation']) {
                    $designs[$key]['productByOrientation']['product_image_full_path'] = asset(config($this->productImagesPath)).'/'.$designs[$key]['productByOrientation']['product_image'];
                } 
            }
            return $designs;
        }
        return $designs;
    }
}