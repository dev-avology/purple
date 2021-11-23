<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ArtistArt;
use Illuminate\Http\Request;
use App\Services\UploadService;

class ShopManagementController extends Controller
{
    private $isProductApproved = 1;
    private $isProductPublic = 1;
    private $uploadService;
    private $artworkUploadPath;
    private $availableExtensions;

    public function __construct()
    {
        $this->availableExtensions = config('file-upload-extensions.image');
        $this->artworkUploadPath = config('file-upload-paths.artwork');
        $this->uploadService = new uploadService();
    }

    public function getDesignsByShop($username)
    {
        $designs = ArtistArt::where([
            'is_public' => $this->isProductPublic,
            'is_approved' => $this->isProductApproved,
            'user_id' => auth()->user()->id,
        ])->get()->toArray();

        foreach ($designs as $key => $product) {
            $designs[$key]['art_photo_path'] = asset(config('file-upload-paths.artwork') . '/' . $product['art_photo_path']);
        }
        return $designs;
    }

    public function deleteDesignFromShop($designID)
    {
        if (ArtistArt::where(['art_id' => $designID, 'user_id' => auth()->user()->id])->delete()) {
            return response()->json(['message' => 'Design has been deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Someting went wrong while deleting the design.'], 500);
        }
    }

    public function getDesignDetails($designID)
    {
        $design = ArtistArt::where(['art_id' => $designID, 'user_id' => auth()->user()->id])->first()->toArray();
        $design['art_photo_path'] = asset(config('file-upload-paths.artwork') . '/' . $design['art_photo_path']);
        return $design;
    }

    public function updateDesignDetails(Request $request)
    {
        $designDataArray = $request->all();

        if (isset($designDataArray['art_photo'])) {
            $artworkUploadResponse = $this->uploadService->handleUploadedImages($designDataArray['art_photo'], $this->artworkUploadPath, $this->availableExtensions);
            if ($artworkUploadResponse) {
                $designDataArray['art_photo_path'] = $artworkUploadResponse;
                unset($designDataArray['art_photo']);
            }
        }

        $response = ArtistArt::where([
            'art_id' => $designDataArray['art_id'], 
            'user_id' => auth()->user()->id
        ])->update($designDataArray);
        
        if ($response) {
            return response()->json(['message' => 'Design has been updated successfully'], 200);
        }
        return response()->json(['message' => 'Someting went wrong while updating the design.'], 500);
    }
}
