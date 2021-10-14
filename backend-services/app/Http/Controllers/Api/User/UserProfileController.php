<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Services\UploadService;

class UserProfileController extends Controller
{
    private $availableExtensions;
    private $uploadService;
    private $profilePhotoUploadPath;
    private $profileCoverPhotoUploadPath;

    public function __construct()
    {
        $this->availableExtensions = config('file-upload-extensions.image');
        $this->profilePhotoUploadPath = config('file-upload-paths.profile');
        $this->profileCoverPhotoUploadPath = config('file-upload-paths.profile-cover');
        $this->uploadService = new uploadService();
    }

    public function getUserProfile() {
        return [
            'id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'role' => auth()->user()->role,
        ];
    }

    public function saveUserProfile(Request $request) {

        $profilePhoto = $this->uploadProfile($request->user_avatar);

        if (!$profilePhoto) {
            return response()->json(['message' => 'You have upload incorrect file type of profile photo.'], 400);
        }

        $coverImage = $this->uploadProfileCover($request->cover_image);

        if (!$coverImage) {
            return response()->json(['message' => 'You have upload incorrect file type of profile photo.'], 400);
        }

        $dataArray = [
            'user_id' => auth()->user()->id,
            'user_avatar' => $profilePhoto,
            'cover_image' =>$coverImage,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'display_name' => $request->display_name,
            'bio' => $request->bio,
        ];
        Profile::updateOrCreate(['user_id' => auth()->user()->id],$dataArray);
        return response()->json(['status' => 200, 'message' => 'profile has been updated successfully.']);
    }

    private function uploadProfile($userAvatar) {
        $profilePhoto = $this->uploadService->handleUploadedImages($userAvatar, $this->profilePhotoUploadPath, $this->availableExtensions);

        if (!$profilePhoto) return false;
        return $profilePhoto;
    }

    private function uploadProfileCover($coverImage) {
        $coverPhoto = $this->uploadService->handleUploadedImages($coverImage, $this->profileCoverPhotoUploadPath, $this->availableExtensions);

        if (!$coverPhoto) return false;
        return $coverPhoto;
    }
}
