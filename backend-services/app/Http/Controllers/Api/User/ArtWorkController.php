<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function saveArtWork(Request $request)
    {

        $artworkUploadResponse = $this->uploadService->handleUploadedImages($request->file('art_photo'), $this->artworkUploadPath, $this->availableExtensions);

        if (!$artworkUploadResponse) {
            return response()->json(['message' => 'You have upload incorrect file type.'], 400);
        }

       echo $artWorkID = generateStringID();

       echo "<br/>";
        
       echo $slug = generateSlug($request->input('title'));


        echo "<pre>";
        print_r($request->all());

    }
}
