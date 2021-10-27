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
        
        $userProfile = Profile::where('user_id', auth()->user()->id)->first();

        $userProfileImage = null;
        $userCoverImage = null;

        if (optional($userProfile)->user_avatar) {
            $userProfileImage = asset(config('file-upload-paths.profile').'/'.optional($userProfile)->user_avatar);
        }

        if (optional($userProfile)->cover_image) {
            $userCoverImage = asset(config('file-upload-paths.profile-cover').'/'.optional($userProfile)->cover_image);
        }

        return [
            'id'            => auth()->user()->id,
            'name'          => auth()->user()->name,
            'email'         => auth()->user()->email,
            'role'          => auth()->user()->role,
            'user_avatar'   => $userProfileImage,
            'cover_image'   => $userCoverImage,
            'first_name'    => optional($userProfile)->first_name,
            'last_name'     => optional($userProfile)->last_name,
            'display_name'  => optional($userProfile)->display_name,
            'bio'           => optional($userProfile)->bio,
        ];
    }

    public function saveUserProfile(Request $request) {
        
        $profilePhoto = null;
        $coverImage = null;

        if (isset($request->user_avatar)) {
            $profilePhoto = $this->uploadProfile($request->user_avatar);
            
            if (!$profilePhoto) {
                return response()->json(['message' => 'You have upload incorrect file type of profile photo.'], 400);
            }
        }
        
        if (isset($request->cover_image)) {
            $coverImage = $this->uploadProfileCover($request->cover_image);

            if (!$coverImage) {
                return response()->json(['message' => 'You have upload incorrect file type of cover photo.'], 400);
            }
        }

        $display_name = $request->display_name;
        if (!$request->display_name) {
            $display_name = 'username';
        } 

        $dataArray = [
            'user_id' => auth()->user()->id,
            'user_avatar' => $profilePhoto,
            'cover_image' => $coverImage,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'display_name' => $display_name,
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
