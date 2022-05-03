<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveArtWorkRequest;
use App\Models\ArtistArt;
use App\Models\User;
use App\Services\UploadService;
use App\Services\PriceCalculation;
use Illuminate\Http\Request;
use App\Traits\AddProductsToFeaturedProducts;

class ArtWorkController extends Controller
{
    use AddProductsToFeaturedProducts;

    private $availableExtensions;
    private $uploadService;
    private $priceCalculation;
    private $artworkUploadPath;
    private $isProductFeatured = 1;
    private $isProductPublic = 1;
    private $isProductApproved = 1;
    private $artworkImagesPath;

    public function __construct()
    {
        $this->availableExtensions = config('file-upload-extensions.image');
        $this->artworkUploadPath = config('file-upload-paths.artwork');
        $this->productImagesPath = 'file-upload-paths.products';
        $this->uploadService = new uploadService();
        $this->priceCalculation = new priceCalculation();
    }

    public function saveArtWork(SaveArtWorkRequest $request)
    {
       
        $validatedArtWorkData = $request->validated();

        $artworkUploadResponse = $this->uploadService->handleUploadedImages($request['art_photo'], $this->artworkUploadPath, $this->availableExtensions);

        if (!$artworkUploadResponse) {
            return response()->json(['message' => 'You have upload incorrect file type. Or Art image is missing'], 400);
        }

        $dataArray = $this->artWorkDataArray($validatedArtWorkData, $artworkUploadResponse);
        $dataArray['orientation'] = 'landscape'; // need to impplement logic to get image orientation
       
        $artistShareAmount = $this->priceCalculation->calculateDesignPrice(9);
        $dataArray['price'] = $artistShareAmount;
        $dataArray['user_id'] = auth()->user()->id;

        if (ArtistArt::create($dataArray)) {
            return response()->json(['message' => 'Artwork has been created successfully.'], 200);
        }
        return response()->json(['message' => 'Something went wrong while saving Artwork on server.'], 500);
    }

    public function deleteArtWork(Request $request)
    {
        $is_deleted = ArtistArt::where([
            'art_id' => $request['art_id'], 
            'user_id' => $request['user_id']
        ])->delete();
        
        if ($is_deleted) {
            return response()->json(['message' => 'Artwork has been deleted successfully.'], 200);
        }
        return response()->json(['message' => 'Something went wrong while deleting Artwork.'], 200);
    }

    public function getFeaturedProducts()
    {
        $featuredProducts = ArtistArt::with(['artist', 'artist_profile'])->where([
            'is_featured' => $this->isProductFeatured,
            'is_public' => $this->isProductPublic,
            'is_approved' => $this->isProductApproved,
        ])->get()->toArray();

        foreach ($featuredProducts as $key => $product) {
            if (isset($product['artist'])) {
                $featuredProducts[$key]['art_photo_path'] = asset(config('file-upload-paths.artwork') . '/' . $product['art_photo_path']);
                $featuredProducts[$key]['artist'] = filterArtistProfile($featuredProducts[$key]['artist'], $featuredProducts[$key]['artist_profile']);
                unset($featuredProducts[$key]['artist_profile']);
            }
        }
        $featuredProducts = $this->addFeaturedProducts($featuredProducts);
        return $featuredProducts;
    }

    public function getSimilarDesignsByTags(Request $request)
    {
        $categoryID = $request['catID'];
        $designs = ArtistArt::where('category_id', $categoryID)->take(20)->get()->toArray();

        if (count($designs)) {
            return $designs;
        }
        return response()->json(['message' => 'No similar designs found.'], 200);
    }

    private function artWorkDataArray($validatedArtWorkData, $artworkUploadResponse)
    {
        $artWorkID = generateStringID();
        $slug = generateSlug($validatedArtWorkData['title']);

        return [
            'user_id'           => $validatedArtWorkData['user_id'],
            'title'             => $validatedArtWorkData['title'],
            'slug'              => $slug,
            'art_id'            => $artWorkID,
            'tags'              => $validatedArtWorkData['tags'],
            'description'       => $validatedArtWorkData['description'],
            'art_photo_path'    => $artworkUploadResponse,
            'artwork_media_id'  => $validatedArtWorkData['artwork_media_id'],
            'is_mature_content' => $validatedArtWorkData['is_mature_content'],
            'is_public'         => $validatedArtWorkData['is_public'],
        ];
    }

    public function getExploreDesign()
    {
        $exploreDesign = ArtistArt::with(['artist'])->where([
            //'is_featured' => $this->isProductFeatured,
            'is_public' => $this->isProductPublic,
            'is_approved' => $this->isProductApproved,
        ])->inRandomOrder()->limit(5)->get()->toArray();//exploreDesign

        foreach ($exploreDesign as $key => $product) {
            if (isset($product['artist'])) {
                $exploreDesign[$key]['art_photo_path'] = asset(config('file-upload-paths.artwork') . '/' . $product['art_photo_path']);

                $exploreDesign[$key]['design_count'] = $this->artistDesignCount($product['user_id']);               
            }
        }
        $exploreDesign = $this->addFeaturedProducts($exploreDesign);
        return $exploreDesign;

    }
    protected function artistDesignCount($id){
        if($id):
            $design_count = ArtistArt::where('user_id', $id)->count();
            return $design_count;
        endif;
    }
    public function getFanArtMadeByArtist()
    {
        $response = User::with('design')->where('role', 'seller')->inRandomOrder()->limit(5)->get();
        return $response;
    }


}
