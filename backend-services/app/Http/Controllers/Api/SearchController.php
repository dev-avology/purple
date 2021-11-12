<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ArtistArt;
use Illuminate\Http\Request;
use App\Traits\FilterCategoryData;

class SearchController extends Controller
{
    use FilterCategoryData;

    private $prodcuts_limit;
    private $productImagesPath;
    private $categoryImagesPath;
    private $artworkImagesPath;
    private $productIsApproved = 1; // Product Must be approved in order to fetch and join with category Data;

    public function __construct()
    {
        $this->prodcuts_limit = config('pagination-limit.products-limit');
        $this->categoryImagesPath = 'file-upload-paths.category-images';
        $this->artworkImagesPath = 'file-upload-paths.artwork';
        $this->productImagesPath = 'file-upload-paths.products';
    }

    public function searchProducts($catSlug = null, Request $request)
    {
        $categoryID = $this->getCategoryIDBySlug($catSlug);
        $designs = ArtistArt::with([
            'designsByCategory',
            'productByOrientation', 
            'artist'
            ])->where([
            'is_approved' => $this->productIsApproved
            ])
            ->tagFilter($request['tag'])
            ->categoryIDFilter($categoryID)
            ->artMediaFilter($request['art-media'])
            ->take($this->prodcuts_limit)
            ->get();
        foreach ($designs as $key => $singleDesign) {
            $designs[$key]['art_photo_path'] = addFullPathToUploadedImage($this->artworkImagesPath, $singleDesign['art_photo_path']);
        }
        return $designs;
    }
}