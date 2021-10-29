<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArtistArt as Product;

class SingleProductController extends Controller
{
    private $productIsApproved = 1; // Product Must be approved in order to fetch and join with category Data;

    public function getProductBySlugAndID(Request $request)
    {
        if (isset($request['slug']) && isset($request['art_id'])) {
            
            $singleProduct = Product::with([
                'artist', 'artist_profile'
            ])->where([
                'art_id' => $request['art_id'], 
                'is_approved' => $this->productIsApproved
            ])->first();

            if (!$singleProduct) {
                return response()->json(['message' => 'Product Not Found.'], 200);
            }
            
            $singleProduct = $singleProduct->toArray();
            $singleProduct['artist'] = filterArtistProfile($singleProduct['artist'], $singleProduct['artist_profile']);
            unset($singleProduct['artist_profile']);
            return $singleProduct;
        }
        return response()->json(['message' => 'Add Slug and Art ID.'], 200);
    }
}
