<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveProductRequest;
use App\Services\UploadService;
use App\Models\Product;
use App\Models\ProductSubCategory as Category;

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
        $products = Product::get();
        return view('admin.products.list-products', ['products' => $products]);
    }

    public function addNewProduct()
    {
        $categories = Category::get(['id', 'name'])->toArray();
        return view('admin.products.edit-or-add-product', ['categories' => $categories, 'product' => null]);
    }

    public function saveProduct(SaveProductRequest $request)
    {
        $validateProductData = $request->validated();

        if ($request->product_image) {
            $productImage = $this->uploadService->handleUploadedImages($request->product_image, $this->artworkUploadPath, $this->availableExtensions);

            if (!$productImage) {
                return back()->with('error', 'You have upload incorrect file type for product image.');
            }
            $validateProductData['product_image'] = $productImage;
        }

        $prevURL = str_replace(url('/'), '', url()->previous());

        if ($prevURL === '/add-new-product' && !$request->product_image) {
            return back()->with('error', 'Product Image is required');
        }

        if (Product::updateOrCreate(['id' => $request->product_id], $validateProductData)) {
            return back()->with('success', 'Product has been successfully saved.');
        }
        return back()->with('error', 'Something went wrong while saving product.');
    }

    public function updateProduct($product_id)
    {
        $product = Product::find($product_id);
        $categories = Category::get(['id', 'name'])->toArray();
        return view('admin.products.edit-or-add-product', ['categories' => $categories, 'product' => $product]);
    }

    public function deleteProduct($product_id)
    {
        if (Product::where('id', $product_id)->delete()) {
            return back()->with('success', 'Successfully Deleted the product.');
        }
        return back()->with('error', 'Something went wrong while deleting the product.');
    }
}
