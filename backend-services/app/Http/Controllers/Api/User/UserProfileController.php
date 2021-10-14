<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function getUserProfile() {
        return [
            'id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'role' => auth()->user()->role,
        ];
    }
}
