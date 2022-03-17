<?php

namespace App\Services;

use App\Models\ArtistPriceShare;
use App\Models\ProductSubCategory as Category;

class PriceCalculation
{
   public function calculateDesignPrice($productCategoryID)
   {
        $productStartFrom = $this->getProductsStartingRangeByCategory($productCategoryID);
        $artistPriceShareInPercentage = $this->getArtistShareByProductCategory($productCategoryID);
        $artistShareInAmount = ($artistPriceShareInPercentage / 100) * $productStartFrom;
        return $productStartFrom + $artistShareInAmount;
   }
   
   private function getProductsStartingRangeByCategory($id)
   {
        $rawData = Category::with(['products'])->where(['id' => $id])->first();
        return $rawData->products->min('price');
   }

   private function getArtistShareByProductCategory($id)
   {
        $rawData = ArtistPriceShare::where([
            'artist_id' => auth()->user()->id, 
            'product_category_id' => $id
        ])->first();
        if($rawData) return $rawData->price_share;
        else return 0;
        
   }
}
