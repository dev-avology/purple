<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveProductRequest;
use App\Services\UploadService;
use App\Models\Product;

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
            return back()->with('error', 'You have upload incorrect file type for product image.');
        }

        $validateProductData['product_image'] = $productImage;

        if (Product::create($validateProductData)) {
            return back()->with('success', 'Product has been successfully saved.');
        }
        return back()->with('error', 'Something went wrong while saving product.');
    }
}
