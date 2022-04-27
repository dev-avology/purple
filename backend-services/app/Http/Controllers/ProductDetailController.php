<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtistArt as Design;
use App\Models\Product;
use Intervention\Image\ImageManager;

class ProductDetailController extends Controller
{

    private $productIsApproved = 1;
    private $productImagesPath;
    private $artworkImagesPath;
    private $imageManager;
    
    
    public function __construct(ImageManager $imageManager)
    {
        $this->prodcuts_limit = config('pagination-limit.products-limit');
        $this->artworkImagesPath = 'file-upload-paths.artwork';
        $this->productImagesPath = 'file-upload-paths.products';
        $this->imageManager = $imageManager;
    }

    public function index($art_id, $userId, $slug, $product_id) {
        session()->put('userId',$userId);
    
        $singleProduct = $this->getProductBySlugAndID($art_id, $slug);

        $productData = Product::where('id', $product_id)->first();
        
        //echo $productData->product_image;
        $productImage = base_path(config($this->productImagesPath).'/'.$productData->product_image);
        $designImage = base_path(config($this->artworkImagesPath).'/'.$singleProduct['art_photo_name']);
       
        //$this->mergeImg($productImage, $designImage);
        //$this->createMergedImage($productImage, $designImage);
        
        return view('frontend.product-detail', ['product' => $singleProduct, 'productImage' => $productImage]);
    }

    private function mergeImg($image1, $image2)
    {
        list($width,$height) = getimagesize($image2);

        // echo "Image Width: ".$width;
        // echo "<br>";
        // echo "Image height: ".$height;
        // die;

        $image1 = imagecreatefromjpeg($image1);
        $image2 = imagecreatefromjpeg($image2);

        imagecopymerge($image1,$image2,500,260,10,0,600,600,1000);
        header('Content-Type:image/png');
        imagepng($image1);

        $masterImg = imagepng($image1,'merged.png');

        dd($masterImg);
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
