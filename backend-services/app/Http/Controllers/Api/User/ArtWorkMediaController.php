<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\ArtistArt;
use App\Models\ArtWorkMedium as ArtMedia;
 
class ArtWorkMediaController extends Controller
{
    public function getArtWorkMedia(){
        return ArtMedia::get();
    }

    public function returnCountOfTotalArts(){
        return ArtistArt::where('user_id', auth()->user()->id)->count();
    }
}
