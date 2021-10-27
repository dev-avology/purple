<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Models\Cart;

class CartController extends Controller
{
    public function saveCart(CartRequest $request) {
        $validateCartData = $request->validated();
        if (Cart::create($validateCartData)) {
            return response()->json(['status' => 200, 'message' => 'Successfully Added']);
        }
    }

    public function getCart() {
        $cart = Cart::where('buyer_id', auth()->user()->id)->get();

        echo "<pre>";
        print_r($cart);
        echo "</pre>";
    }
}
