<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArtistArt;
use App\Models\ProductSubCategory;

class AdminArtWorkController extends Controller
{
    private $artworkListLimit;

    public function __construct()
    {
        $this->artworkListLimit = config('pagination-limit.admin-area-artwork-list-limit');    
    }

    public function index(Request $request) {

        $artistArts = ArtistArt::get();
        return view('admin.artworks', ['artistArts' => $artistArts]);
    }

    public function artWork($artWorkID) {

        $artwork = ArtistArt::where('art_id', $artWorkID)->first();
        $collections = $this->getCollections();
        return view('admin.artwork', compact('artwork', 'collections'));
    }

    private function getCollections()
    {
        return ProductSubCategory::all();
    }
}
