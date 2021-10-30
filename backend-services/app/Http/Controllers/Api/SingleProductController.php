<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArtistArt as Design;

class SingleProductController extends Controller
{
    private $productIsApproved = 1;
    private $prodcuts_limit;
    private $productImagesPath;
    
    public function __construct()
    {
        $this->prodcuts_limit = config('pagination-limit.products-limit');
        $this->productImagesPath = 'file-upload-paths.products';
    }

    public function getProductBySlugAndID(Request $request)
    {
        if (isset($request['slug']) && isset($request['art_id'])) {
            
            $singleProduct = Design::with([
                'artist', 'artist_profile', 'products' => function($product) {
                    $product->take($this->prodcuts_limit);
                }
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

            foreach ($singleProduct['products'] as $key => $product) {
                $singleProduct['products'][$key]['product_image'] = addFullPathToUploadedImage($this->productImagesPath, $product['product_image']);
            }

            return $singleProduct;
        }
        return response()->json(['message' => 'Add Slug and Art ID.'], 200);
    }
}
