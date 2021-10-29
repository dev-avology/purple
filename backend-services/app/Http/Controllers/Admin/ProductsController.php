<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveProductRequest;
use App\Services\UploadService;

class ProductsController extends Controller
{
    private $availableExtensions;
    private $uploadService;

    public function __construct()
    {
        $this->availableExtensions = config('file-upload-extensions.image');
        $this->artworkUploadPath = config('file-upload-paths.products');
        $this->uploadService = new uploadService();
    }

    public function getProducts()
    {
        return view('admin.products.list-products');
    }

    public function addNewProduct()
    {
        return view('admin.products.add-new-product');
    }

    public function saveProduct(SaveProductRequest $request)
    {
        $validateProductData = $request->validated();

        $productImage = $this->uploadService->handleUploadedImages($validateProductData['product_image'], $this->artworkUploadPath, $this->availableExtensions);

        if (!$productImage) {
            return response()->json(['message' => 'You have upload incorrect file type.'], 400);
        }
    }
}
