<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingAddress;

class ShippingController extends Controller
{
    public function save(Request $request)
    {
        if (ShippingAddress::create($request->all())) {
            return response()->json(['status' => 200, 'message' => 'Saved Successfully'], 200);
        } else {
            return response()->json(['status' => 500, 'message' => 'Something Went Wrong'], 200);
        }
    }
}
