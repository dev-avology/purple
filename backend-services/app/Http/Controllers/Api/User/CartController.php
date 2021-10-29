<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Models\Cart;

class CartController extends Controller
{
    private $artworkImagesPath;
    
    public function __construct()
    {
        $this->artworkImagesPath = 'file-upload-paths.artwork';    
    }
    
    public function saveCart(CartRequest $request) {
        $validateCartData = $request->validated();
        if (Cart::create($validateCartData)) {
            return response()->json(['status' => 200, 'message' => 'Successfully Added']);
        }
    }

    public function getCart() {
        $cartCollection = Cart::with(['buyer', 'seller', 'product'])->where('buyer_id', auth()->user()->id)->get();

        if (!isset($cartCollection)) {
            return response()->json(['message' => 'No products found in your cart.'], 200);
        }

        $cartArray = $cartCollection->toArray();
        foreach ($cartArray as $key => $cart) {
            $cartArray[$key]['product']['art_photo_path'] = addFullPathToUploadedImage($this->artworkImagesPath, $cartArray[$key]['product']['art_photo_path']);
        }
        return $cartArray;
    }
}
