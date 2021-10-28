<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArtistArt as Product;

class SingleProductController extends Controller
{
    public function getProductBySlugAndID(Request $request)
    {
        if (isset($request['slug']) && isset($request['art_id'])) {
            $singleProduct = Product::where(['art_id' => $request['art_id']])->first();
            return [
                'id'               => $singleProduct->id,
                'user_id'          => $singleProduct->user_id,
                'art_id'           => $singleProduct->art_id,
                'category_id'      => $singleProduct->category_id,
                'title'            => $singleProduct->title,
                'slug'             => $singleProduct->slug,
                'tags'             => $singleProduct->tags,
                'description'      => $singleProduct->description,
                'art_photo'        => asset(config('file-upload-paths.artwork').''.$singleProduct->art_photo_path),
                'price'            => $singleProduct->price,
                'artwork_media_id' => $singleProduct->artwork_media_id,
                'is_mature_content'=> $singleProduct->is_mature_content,
                'is_public'        => $singleProduct->is_public,
                'is_featured'      => $singleProduct->is_featured,
                'created_at'       => $singleProduct->created_at,
                'updated_at'       => $singleProduct->updated_at,
            ];
        }
        return response()->json(['message' => 'Add Slug and Art ID.'], 200);
    }
}
