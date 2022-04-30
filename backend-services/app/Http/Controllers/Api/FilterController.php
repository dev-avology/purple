<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory as Category;

class FilterController extends Controller
{
    public function index()
    {
        return "Filtered Results";
    }
}
