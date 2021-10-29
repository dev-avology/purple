<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveProductRequest;

class ProductsController extends Controller
{
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

        echo "<pre>";
        print_r($validateProductData);
        die;
    }
}
