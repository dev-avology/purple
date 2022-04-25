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
    private $orientationType;

    public function __construct()
    {
        $this->availableExtensions = config('file-upload-extensions.image');
        $this->artworkUploadPath = config('file-upload-paths.products');
        $this->uploadService = new uploadService();

        $this->orientationType = [
            ['name' => 'Landscape', 'value' => 'landscape'],
            ['name' => 'Portrait', 'value' => 'portrait'],
            ['name' => 'Square', 'value' => 'square'],
        ];
    }

    public function getProducts()
    {
        $products = Product::get();
        return view('admin.products.list-products', ['products' => $products]);
    }

    public function addNewProduct()
    {
        $categories = Category::get(['id', 'name'])->toArray();
        return view('admin.products.edit-or-add-product', [
            'categories' => $categories, 
            'product' => null, 
            'orientationType' => $this->orientationType
        ]);
    }

    public function saveProduct(SaveProductRequest $request)
    {
        $validateProductData = $request->validated();
        $response = $this->checkOrientation($validateProductData['sub_category'], $validateProductData['orientation']);
        if ($response) {
            return back()->withErrors([
                'orientation' => $validateProductData['orientation'].' Orientation is already existing for this Category. Please Change Orientation or Category.'
            ]);
        }

        if ($request->product_image) {
            $productImage = $this->uploadService->handleUploadedImages($request->product_image, $this->artworkUploadPath, $this->availableExtensions);

            if (!$productImage) {
                return back()->with('error', 'You have uploaded incorrect file type for product image.');
            }
            $validateProductData['product_image'] = $productImage;
        }

        $prevURL = str_replace(url('/'), '', url()->previous());

        if ($prevURL === '/add-new-product' && !$request->product_image) {
            return back()->with('error', 'Product Image is required');
        }
        
        if ($prevURL === '/add-new-product') {
            $uniqueID = generateStringID();
            $slug = generateSlug($validateProductData['title']);
            $validateProductData['slug'] = $slug.'-'.$uniqueID;
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
        return view('admin.products.edit-or-add-product', [
            'categories' => $categories, 
            'product' => $product, 
            'orientationType' => $this->orientationType
        ]);
    }

    public function deleteProduct($product_id)
    {
        if (Product::where('id', $product_id)->delete()) {
            return back()->with('success', 'Successfully Deleted the product.');
        }
        return back()->with('error', 'Something went wrong while deleting the product.');
    }

    private function checkOrientation($category , $productOrientation)
    {
        if(Product::where(['sub_category' => $category, 'orientation' => $productOrientation])->first()) {
            return true;
        }          
        return false;
    }
}
