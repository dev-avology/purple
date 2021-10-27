<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSubCategory as Category;


class CategoryController extends Controller
{
    public function getAllCategories()
    {
        $allCategories = Category::get();

        $filteredData = [];
        $dataArray= [];
        foreach ($allCategories as $category) {
            $dataArray['id'] = $category['id'];
            $dataArray['name'] = $category['name'];
            $dataArray['image'] = asset(config('file-upload-paths.category-images').'/'.$category['image']);
            array_push($filteredData, $dataArray);
        }
        return $filteredData;
    }
}
