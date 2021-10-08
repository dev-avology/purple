<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

use App\Models\ArtWorkMedium as ArtMedia;
 
class ArtWorkMediaController extends Controller
{
    public function getArtWorkMedia() {
        return ArtMedia::get();
    }
}
