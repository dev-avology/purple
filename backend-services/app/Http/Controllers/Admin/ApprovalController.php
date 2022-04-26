<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArtistArt as Product;

class ApprovalController extends Controller
{
    public function approveAndDisApproveArtWork(Request $request)
    {
        $product = Product::find($request->id);
        $product->is_approved = !$product->is_approved;
        if ($product->update()) {
            return response()->json(['message' => 'Successfully updated the approval status.'], 200);
        } 
        return response()->json(['message' => 'Something went wrong while updating approval status.'], 200);
    }
}
