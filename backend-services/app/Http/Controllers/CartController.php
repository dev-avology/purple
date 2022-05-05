<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Services\UploadService;
use Illuminate\Http\UploadedFile;

class CartController extends Controller
{
    private $cartTypeItem;
    private $uploadService;
    private $finalProductImageUploadPath;
    private $availableExtensions;

    public function __construct()
    {
        $this->cartTypeItem = 0;
        $this->finalProductImageUploadPath = config('file-upload-paths.final-product-image');
        $this->uploadService = new uploadService();
        $this->availableExtensions = config('file-upload-extensions.image');
    }

    public function index()
    {
        $cart = Cart::with('product')->where(['buyer_id' => session()->get('userId'), 'is_wishlist_product' => 0])->get();

        return view('frontend.cart', ['cart' => $cart]);
    }

    public function addToCart(Request $request)
    {

        if (empty($request['buyer_id']) || empty($request['seller_id']) || empty($request['product_id']) || empty($request['quantity']) || empty($request['final_product_image']) ) {
            die('Something went wrong while processing the request');
        }

        $uploadedImage = $this->handleUploadedImages($request['final_product_image'], $this->finalProductImageUploadPath);

        $buyer_id = $request['buyer_id'];
        $seller_id = $request['seller_id']; 
        $product_id = $request['product_id'];
        $quantity = $request['quantity'];
        $final_product_image = $uploadedImage;

        $validateCartData = [
            'buyer_id' => $buyer_id,
            'seller_id' => $seller_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'final_product_image' => $final_product_image,
            'frame_id' => 0,
        ];

        $itemType = $this->cartTypeItem;
        
        if ($this->updateIfItemExists($validateCartData, $itemType)) {
            return redirect('cart');
        }
        $response = $this->createItem($validateCartData);
        if ($response) {
            return redirect('cart');
        } else {
            echo "Something went wrong while adding your item to cart.";
        }
    }

    public function saveProductFinalImage(Request $request)
    {
 
        $uploadedImage = $this->handleUploadedImages($request['final_product_image'], $this->finalProductImageUploadPath);
    }

    public function handleUploadedImages(UploadedFile $file, $destinationPath)
    {
        $fileName = rand() . '' . $file->getClientOriginalName();
        $fileName = $fileName.'.png';
        $file->move($destinationPath, $fileName);
        return $fileName;
    }

    private function createItem($validateCartData)
    {
        if (Cart::create($validateCartData)) {
           return true;
        }
        return false;
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
            return redirect()->route('cart');
        }
        return redirect()->route('cart');
    }
}
