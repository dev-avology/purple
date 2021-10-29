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
    private $isProductFeatured = 1; 
    private $isProductPublic = 1; 
    private $isProductApproved = 1; 

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
        $featuredProducts = ArtistArt::with(['artist', 'artist_profile'])->where([
            'is_featured' => $this->isProductFeatured, 
            'is_public' => $this->isProductPublic, 
            'is_approved' => $this->isProductApproved,
        ])->get()->toArray();

        foreach ($featuredProducts as $key => $product) {
            if (isset($product['artist'])) {
                $featuredProducts[$key]['art_photo_path'] = asset(config('file-upload-paths.artwork') . '/' . $product['art_photo_path']);
                $featuredProducts[$key]['artist'] = filterArtistProfile($featuredProducts[$key]['artist'], $featuredProducts[$key]['artist_profile']);
                unset($featuredProducts[$key]['artist_profile']);
            }
        }
        return $featuredProducts;
    }

    private function artWorkDataArray($validatedArtWorkData, $artworkUploadResponse)
    {
        $artWorkID = generateStringID();
        $slug = generateSlug($validatedArtWorkData['title']);

        return [
            'user_id'           => $validatedArtWorkData['user_id'],
            'title'             => $validatedArtWorkData['title'],
            'slug'              => $slug,
            'art_id'            => $artWorkID,
            'tags'              => $validatedArtWorkData['tags'],
            'description'       => $validatedArtWorkData['description'],
            'art_photo_path'    => $artworkUploadResponse,
            'artwork_media_id'  => $validatedArtWorkData['artwork_media_id'],
            'is_mature_content' => $validatedArtWorkData['is_mature_content'],
            'is_public'         => $validatedArtWorkData['is_public'],
        ];
    }
}