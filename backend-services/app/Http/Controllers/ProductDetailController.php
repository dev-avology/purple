<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtistArt as Design;
use App\Models\Product;


class ProductDetailController extends Controller
{

    private $productIsApproved = 1;
    private $productImagesPath;
    private $artworkImagesPath;
    

     
    public function __construct()
    {
        $this->prodcuts_limit = config('pagination-limit.products-limit');
        $this->artworkImagesPath = 'file-upload-paths.artwork';
        $this->productImagesPath = 'file-upload-paths.products';
    }

    public function index($art_id, $userId, $slug, $product_id, $category) {
        session()->put('userId',$userId);
    
        $singleProduct = $this->getProductBySlugAndID($art_id, $slug);

        $productData = Product::where('id', $product_id)->first();
        
        //echo $productData->product_image;
        $productImage = addFullPathToUploadedImage($this->productImagesPath, $productData->product_image); 
        
        return view('frontend.product-detail', [
            'product' => $singleProduct, 
            'productImage' => $productImage, 
            'category' => $category
        ]);
    }

    private function getProductBySlugAndID($art_id, $slug)
    {
       
        $singleProduct = Design::with([
            'artist', 'artist_profile', 'product' => function($product) use($slug){
                $product->where('slug', $slug);
            }
        ])->where([
            'art_id' => $art_id, 
            'is_approved' => $this->productIsApproved
        ])->first();

        if (!$singleProduct) {
            return response()->json(['message' => 'Product Not Found.'], 200);
        }

        $singleProduct = $singleProduct->toArray();
        $singleProduct['artist'] = filterArtistProfile($singleProduct['artist'], $singleProduct['artist_profile']);
        $singleProduct['art_photo_name'] = $singleProduct['art_photo_path'];
        $singleProduct['art_photo_path'] = addFullPathToUploadedImage($this->artworkImagesPath, $singleProduct['art_photo_path']);
        unset($singleProduct['artist_profile']);

        foreach ($singleProduct['product'] as $key => $product) {
            $singleProduct['product'][$key]['product_image'] = addFullPathToUploadedImage($this->productImagesPath, $product['product_image']);
            
        }
        // echo "<pre>";
        // print_r($singleProduct);die;
        return $singleProduct;
        
    }
}
