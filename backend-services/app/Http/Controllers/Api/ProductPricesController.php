<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory as Category;
use App\Models\ArtistPriceShare;

class ProductPricesController extends Controller
{
    public function index()
    {
        $productsArray = [];
        $rawData = Category::with(['products'])->get();

        $flag = 0;
        foreach ($rawData as $key => $data) {
            if ($data->products->count()) {

                $dataArray = $data->toArray();
                array_push($productsArray, $dataArray);
                $productsArray[$flag]['ProductsPriceRange']['max'] = $data->products->max('price');
                $productsArray[$flag]['ProductsPriceRange']['min'] = $data->products->min('price');
                unset($productsArray[$flag]['products']);
                $flag++;     
            }
        }
        return $productsArray;
    }

    public function saveArtistShareByCategory()
    {
        $data = [
            'artist_id' => auth()->user()->id,
            'price_share' => request('price_share'),
            'product_category_id' => request('product_category_id'),
        ];
        if (ArtistPriceShare::updateOrCreate( ['product_category_id' => request('product_category_id')] ,$data)) {
            return response()->json(['message' => 'Artist price share has been saved successfully.'], 200);
        } 
        return response()->json(['message' => 'Something Went wrong while saving Artist price share.'], 500);
    }
}
