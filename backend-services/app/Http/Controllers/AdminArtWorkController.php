<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtistArt;

class AdminArtWorkController extends Controller
{
    private $artworkListLimit;

    public function __construct()
    {
        $this->artworkListLimit = config('pagination-limit.admin-area-artwork-list-limit');    
    }

    public function index(Request $request) {

        $artistArts = ArtistArt::get();

        // if ($request->ajax()) {
        //     $artworkData = view('admin.ajax-templates.artistArts', ['artistArts' => $artistArts])->render();
        //     return response()->json(['html' => $artworkData], 200);
        // }
        return view('admin.artworks', ['artistArts' => $artistArts]);
    }

    public function artWork($artWorkID) {
        return view('admin.artwork');
    }
}
