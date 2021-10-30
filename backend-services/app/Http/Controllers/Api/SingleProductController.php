<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArtistArt as Design;

class SingleProductController extends Controller
{
    private $productIsApproved = 1;
    private $artworkImagesPath;
    
    public function __construct()
    {
        $this->prodcuts_limit = config('pagination-limit.products-limit');
        $this->artworkImagesPath = 'file-upload-paths.artwork';
    }

    public function getProductBySlugAndID(Request $request)
    {
        if (isset($request['slug']) && isset($request['art_id'])) {
            
            $singleProduct = Design::with([
                'artist', 'artist_profile'
            ])->where([
                'art_id' => $request['art_id'], 
                'slug' => $request['slug'],
                'is_approved' => $this->productIsApproved
            ])->first();

            if (!$singleProduct) {
                return response()->json(['message' => 'Product Not Found.'], 200);
            }

            $singleProduct = $singleProduct->toArray();
            $singleProduct['artist'] = filterArtistProfile($singleProduct['artist'], $singleProduct['artist_profile']);
            $singleProduct['art_photo_path'] = addFullPathToUploadedImage($this->artworkImagesPath, $singleProduct['art_photo_path']);
            unset($singleProduct['artist_profile']);

            return $singleProduct;
        }
        return response()->json(['message' => 'Add Slug and Art ID.'], 200);
    }
}
