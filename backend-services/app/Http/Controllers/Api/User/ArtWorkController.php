<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtWorkController extends Controller
{
    public function saveArtWork(Request $request) {
        echo "<pre>";
        print_r($request->all());
        echo "</pre>";
    }
}
