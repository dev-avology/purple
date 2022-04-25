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
    private $cartTypeItem;
    private $wishlistItemType;

    public function __construct()
    {
        $this->availableExtensions = config('file-upload-extensions.image');
        $this->artworkImagesPath = 'file-upload-paths.artwork';
        $this->FinalImagesPath = 'file-upload-paths.final-product-image';
        $this->finalProductUploadPath = config('file-upload-paths.final-product-image');
        $this->uploadService = new uploadService();
        $this->cartTypeItem = 0;
        $this->wishlistItemType = 1;
    }

    public function saveCart(CartRequest $request)
    {
        $validateCartData = $request->validated();  
        if ($request->path() === 'api/save-wishlist') {
            $validateCartData['is_wishlist_product'] = 1;
            $validateCartData['final_product_image'] = 'Final Product Image is not created yet.';
            $itemType = $this->wishlistItemType;
        } else {
            if ($request->final_product_image) {
                $productImage = $this->uploadService->handleUploadedImages($request->final_product_image, $this->finalProductUploadPath, $this->availableExtensions);
                if (!$productImage) {
                    return response()->json(['message' => 'You have uploaded incorrect file type for product image.'], 200);
                }
                $validateCartData['final_product_image'] = $productImage;            
                $itemType = $this->cartTypeItem;
            } else {
                return response()->json(['message' => 'Final Product Image is required'], 200);
            }
        }
        if ($this->updateIfItemExists($validateCartData, $itemType)) {
            return response()->json(['status' => 200, 'message' => 'Successfully Updated.']);
        }
        return $this->createItem($validateCartData);
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
			$cartArray[$key]['final_product_image'] = addFullPathToUploadedImage($this->FinalImagesPath, $cartArray[$key]['final_product_image']);
        }
        return $cartArray;
    }

    public function decrementCart(Request $request)
    {
        $cartItem = $this->checkIfItemExists([
            'buyer_id' => $request['buyer_id'],
            'product_id' => $request['product_id'],
        ], $this->cartTypeItem);

        if ($cartItem) {
            $cartItem->quantity -= 1;
            if ($cartItem->quantity) {
                $cartItem->save();
                return response()->json(['status' => 200, 'message' => 'Quantity decreased successfully.'], 200);
            } 
            $cartItem->delete();
            return response()->json(['status' => 200, 'message' => 'Item has been removed.'], 200);
        }
        return response()->json(['status' => 200, 'message' => 'Cart is Empty.']);
    }

    public function incrementCart(Request $request)
    {
        $cartItem = $this->checkIfItemExists([
            'buyer_id' => $request['buyer_id'],
            'product_id' => $request['product_id'],
        ], $this->cartTypeItem);

        if ($cartItem) {
            $cartItem->quantity += 1;
            if ($cartItem->quantity) {
                $cartItem->save();
                return response()->json(['status' => 200, 'message' => 'Quantity increased successfully.'], 200);
            } 
        }
        return response()->json(['status' => 200, 'message' => 'Cart is Empty.']);
    }

    public function removeItem(Request $request)
    {
        $dataArray = [
            'buyer_id' => $request['buyer_id'], 
            'product_id' => $request['product_id'],
        ];

        if ($request->path() === 'api/remove-from-wishlist') {
            $dataArray['is_wishlist_product'] = $this->wishlistItemType; 
        } else {
            $dataArray['is_wishlist_product'] = $this->cartTypeItem;
        }

        $response = Cart::where($dataArray)->delete();
        if ($response) {
            return response()->json(['status' => 200, 'message' => 'Successfully removed the item.']);
        }
        return response()->json(['status' => 200, 'message' => 'No items are left.']);
    }

    private function createItem($validateCartData)
    {
        if (Cart::create($validateCartData)) {
            return response()->json(['status' => 200, 'message' => 'Successfully Added.']);
        }
        return response()->json(['status' => 200, 'message' => 'Something went wrong while adding item.']);
    }

    private function updateIfItemExists($validateCartData, $item_type)
    {
        $cartItem = $this->checkIfItemExists($validateCartData, $item_type);

        if ($cartItem) {
            $cartItem->quantity += 1;

            if ($cartItem->save($validateCartData)) {
                return true;
            }
        }
        return false;
    }

    private function checkIfItemExists($validateCartData, $item_type)
    {
        return Cart::where([
            'buyer_id' => $validateCartData['buyer_id'],
            'product_id' => $validateCartData['product_id'],
            'is_wishlist_product' => $item_type,
        ])->first();
    }
}
