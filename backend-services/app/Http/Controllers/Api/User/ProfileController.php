<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProfileRequest;
use App\Models\Profile;
use App\Services\UploadService;

class ProfileController extends Controller
{
    private $uploadService;

    public function __construct()
    {
        $this->uploadService = new UploadService();
    }
    
    public function saveUserProfile(SaveProfileRequest $request) {
        echo "Save Profile";
    }
}
