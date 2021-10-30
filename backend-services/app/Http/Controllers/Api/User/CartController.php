<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Services\UploadService;
use App\Models\Cart;

class CartController extends Controller
{
    private $availableExtensions;
    private $artworkImagesPath;
    private $uploadService;
    private $finalProductUploadPath;

    public function __construct()
    {
        $this->availableExtensions = config('file-upload-extensions.image');
        $this->artworkImagesPath = 'file-upload-paths.artwork';
        $this->finalProductUploadPath = config('file-upload-paths.final-product-image');
        $this->uploadService = new uploadService();
    }

    public function saveCart(CartRequest $request)
    {
        $validateCartData = $request->validated();

        if ($request->path() === 'api/save-wishlist') {
            $validateCartData['is_wishlist_product'] = 1;
            $validateCartData['final_product_image'] = 'Final Product Image is not created yet.';
        } else {
            if ($request->final_product_image) {
                $productImage = $this->uploadService->handleUploadedImages($request->final_product_image, $this->finalProductUploadPath, $this->availableExtensions);

                if (!$productImage) {
                    return response()->json(['message' => 'You have uploaded incorrect file type for product image.'], 200);
                }
                $validateCartData['final_product_image'] = $productImage;
            } else {
                return response()->json(['message' => 'Final Product Image is required'], 200);
            }
        }
        
        if (Cart::create($validateCartData)) {
            return response()->json(['status' => 200, 'message' => 'Successfully Added']);
        }
    }

    public function getCart(Request $request)
    {
        $cartCollection = Cart::with(['buyer', 'seller', 'product'])->where([
            'buyer_id' => auth()->user()->id,
            'is_wishlist_product' => $request['is_wishlist_product'],
        ])->get();

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
