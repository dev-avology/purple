<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    private $productImagesPath;

    public function __construct()
    {
        $this->productImagesPath = 'file-upload-paths.products';  
    }

    public function index()
    {
        $products = Product::get()->toArray();

        foreach ($products as $key => $product) {
            $products[$key]['product_image'] = addFullPathToUploadedImage($this->productImagesPath, $product['product_image']);
        }
        return $products;
    }
}
