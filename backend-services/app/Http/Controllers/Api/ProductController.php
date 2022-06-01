<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\FinalProduct;
use App\Models\ArtistArt;
use App\Services\PriceCalculation;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    private $productImagesPath;
    private $priceCalculation;

    public function __construct()
    {
        $this->productImagesPath = 'file-upload-paths.products';  
        $this->priceCalculation = new priceCalculation();
    }

    public function index()
    {
        $products = Product::get()->toArray();

        foreach ($products as $key => $product) {
            $products[$key]['product_image'] = addFullPathToUploadedImage($this->productImagesPath, $product['product_image']);
        }
        return $products;
    }

    public function saveProduct() 
    {
        $product_data = request()->all();

        foreach ($product_data as $product) {
            json_encode($product['stages']);

            $data = [
                'image' => $product['stages']['front']['image'],
                'overlay' => $product['stages']['front']['overlay'],
                'updated' => $product['stages']['front']['updated'],
                'product_width' => $product['stages']['front']['product_width'],
                'product_height' => $product['stages']['front']['product_height'],
                'devicePixelRatio' => $product['stages']['front']['devicePixelRatio'],
                'screenshot' => $product['stages']['front']['screenshot'],
                'print_file' => $product['stages']['front']['print_file'],
                'dump_data' => 'test',
            ];
            
            FinalProduct::create($data);
        }
        return true;
    }

    public function productDesigner() {

        // $data = [
        //     [
        //         'frame_image' => 'http://localhost/purple/backend-services/uploads/products/12752849951.Featured-Mockups-Art-Prints.png',
        //         'design_image' => 'http://localhost/purple/backend-services/uploads/artwork-images/258465388klara-kulikova-7kup71V823I-unsplash.jpeg'
        //     ],
        //     [
        //         'frame_image' => 'http://localhost/purple/backend-services/uploads/products/21255265891.Feature-Framed-Prints.png',
        //         'design_image' => 'http://localhost/purple/backend-services/uploads/artwork-images/258465388klara-kulikova-7kup71V823I-unsplash.jpeg'
        //     ],
        //     [
        //         'frame_image' => 'http://localhost/purple/backend-services/uploads/products/742297801.Feature-Metal-Prints.png',
        //         'design_image' => 'http://localhost/purple/backend-services/uploads/artwork-images/258465388klara-kulikova-7kup71V823I-unsplash.jpeg'
        //     ],
        //     [
        //         'frame_image' => 'http://localhost/purple/backend-services/uploads/products/21255265891.Feature-Framed-Prints.png',
        //         'design_image' => 'http://localhost/purple/backend-services/uploads/artwork-images/258465388klara-kulikova-7kup71V823I-unsplash.jpeg'
        //     ],
        // ];


        $data = [
            [
                'frame_image' => 'http://146.190.226.38/backend-services/uploads/products/12752849951.Featured-Mockups-Art-Prints.png',
                'design_image' => 'http://146.190.226.38/backend-services/uploads/artwork-images/258465388klara-kulikova-7kup71V823I-unsplash.jpeg'
            ],
            [
                'frame_image' => 'http://146.190.226.38/backend-services/uploads/products/21255265891.Feature-Framed-Prints.png',
                'design_image' => 'http://146.190.226.38/backend-services/uploads/artwork-images/258465388klara-kulikova-7kup71V823I-unsplash.jpeg'
            ],
            [
                'frame_image' => 'http://146.190.226.38/backend-services/uploads/products/742297801.Feature-Metal-Prints.png',
                'design_image' => 'http://146.190.226.38/backend-services/uploads/artwork-images/258465388klara-kulikova-7kup71V823I-unsplash.jpeg'
            ],
            [
                'frame_image' => 'http://146.190.226.38/backend-services/uploads/products/21255265891.Feature-Framed-Prints.png',
                'design_image' => 'http://146.190.226.38/backend-services/uploads/artwork-images/258465388klara-kulikova-7kup71V823I-unsplash.jpeg'
            ],
        ];

        return view('product-designer', ['products' => $data]);
    }

    public function uploadArtistDesign(Request $request) 
    {
        $image = $request->image;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $artistDesignName = Str::random(10) . '.png';
    
        Storage::disk('artist-designs')->put($artistDesignName, base64_decode($image));

        $validatedArtWorkData = [
            'user_id' => 8,
            'title' => 'test', 
            'tags' => 'test,test,testing',
            'description' => 'test description',
            'artwork_media_id' => '1,2',
            'is_mature_content' => 0,
            'is_public' => 1,
        ];

        $dataArray = $this->artWorkDataArray($validatedArtWorkData, $artistDesignName);
        $dataArray['orientation'] = 'landscape'; 
       
        $artistShareAmount = $this->priceCalculation->calculateDesignPrice(9);
        $dataArray['price'] = $artistShareAmount;
        $dataArray['user_id'] = 15; // User ID is static for testing purpose. For now

        if (ArtistArt::create($dataArray)) {
            return response()->json(['message' => 'Artwork has been created successfully.'], 200);
        }
        return response()->json(['message' => 'Something went wrong while saving Artwork on server.'], 500);
    }

    public function showProducts()
    {
        $products = ArtistArt::where(['user_id' => 15])->get();

        return view('show-products', ['products' => $products]);
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

    // public function uploadImage(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000',
    
    //     ]);

    //     $name = $request->file('image')->getClientOriginalName();
 
    //     $path = $request->file('image')->store('public/artist-designs');
        
    //     return response()->json($path);
    // }
}
