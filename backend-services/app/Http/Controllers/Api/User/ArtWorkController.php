<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveArtWorkRequest;
use App\Models\ArtistArt;

use App\Services\UploadService;

class ArtWorkController extends Controller
{
    private $availableExtensions;
    private $uploadService;
    private $artworkUploadPath;

    public function __construct()
    {
        $this->availableExtensions = config('file-upload-extensions.image');
        $this->artworkUploadPath = config('file-upload-paths.artwork');
        $this->uploadService = new uploadService();
    }

    public function saveArtWork(SaveArtWorkRequest $request)
    {
        $validatedArtWorkData = $request->validated();
        $artworkUploadResponse = $this->uploadService->handleUploadedImages($validatedArtWorkData['art_photo'], $this->artworkUploadPath, $this->availableExtensions);

        if (!$artworkUploadResponse) {
            return response()->json(['message' => 'You have upload incorrect file type.'], 400);
        }

        $dataArray = $this->artWorkDataArray($validatedArtWorkData, $artworkUploadResponse);

        if (ArtistArt::create($dataArray)) {
            return response()->json(['message' => 'Artwork has been created successfully.'], 200);
        }
        return response()->json(['message' => 'Something went wrong while saving Artwork on server.'], 500);
    }

    public function getFeaturedProducts()
    {
        $featuredProducts = ArtistArt::where(['is_featured' => 1, 'is_public' => 1])->get();
        return $this->featuredArtistDataArray($featuredProducts);
    }

    private function featuredArtistDataArray($featuredProducts)
    {
        $filteredData = [];
        $dataArray = [];
        foreach ($featuredProducts as $product) {
            
            if (isset($product->artist)) {
                $dataArray['id'] = $product['id'];
                $dataArray['user_id'] = $product['user_id'];
                $dataArray['title'] = $product['title'];
                $dataArray['slug'] = $product['slug'];
                $dataArray['art_id'] = $product['art_id'];
                $dataArray['category_id'] = $product['category_id'];
                $dataArray['tags'] = $product['tags'];
                $dataArray['price'] = $product['price'];
                $dataArray['description'] = $product['description'];
                $dataArray['art_photo'] = asset(config('file-upload-paths.artwork') . '' . $product['art_photo_path']);
                $dataArray['is_mature_content'] = $product['is_mature_content'];

                $dataArray['artist'] = [
                    'username'    => $product->artist->name,
                    'email'       => $product->artist->email,
                    'created_at'  => $product->artist->created_at,
                    'user_avatar' => asset(config('file-upload-paths.profile').''.$product->artist->profile->user_avatar),
                    'first_name'  => $product->artist->profile->first_name,
                    'last_name'   => $product->artist->profile->last_name,
                    'display_name'=> $product->artist->profile->display_name,
                ];
                array_push($filteredData, $dataArray);
            }
        }
        return $filteredData;
    }

    private function artWorkDataArray($validatedArtWorkData, $artworkUploadResponse)
    {
        $artWorkID = generateStringID();
        $slug = generateSlug($validatedArtWorkData['title']);

        return [
            'user_id' => $validatedArtWorkData['user_id'],
            'title' => $validatedArtWorkData['title'],
            'slug' => $slug,
            'art_id' => $artWorkID,
            'tags' => $validatedArtWorkData['tags'],
            'description' => $validatedArtWorkData['description'],
            'art_photo_path' => $artworkUploadResponse,
            'artwork_media_id' => $validatedArtWorkData['artwork_media_id'],
            'is_mature_content' => $validatedArtWorkData['is_mature_content'],
            'is_public' => $validatedArtWorkData['is_public'],
        ];
    }
}