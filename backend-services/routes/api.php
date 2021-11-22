<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\PassportAuthController;
use App\Http\Controllers\Api\User\UserProfileController;
use App\Http\Controllers\Api\User\ArtWorkController;
use App\Http\Controllers\Api\User\ArtWorkMediaController;
use App\Http\Controllers\Api\User\CartController;
use App\Http\Controllers\Api\User\CategoryController;
use App\Http\Controllers\Api\SingleProductController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\User\PasswordHandlerController;
use App\Http\Controllers\Api\ProductPricesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware(['auth:api', 'scope:buyer,seller'])->group(function() {

    Route::get('get-user-data', [UserProfileController::class, 'getUserProfile']);
    Route::post('save-user-profile', [UserProfileController::class, 'saveUserProfile']);
    Route::get('get-user-profile-status', [UserProfileController::class, 'getProfileStatus']);

    Route::post('save-art-work', [ArtWorkController::class, 'saveArtWork']);

    Route::get('get-artwork-media', [ArtWorkMediaController::class, 'getArtWorkMedia']);
    Route::get('get-designs-count', [ArtWorkMediaController::class, 'returnCountOfTotalArts']);
    Route::post('save-cart', [CartController::class, 'saveCart']);
    Route::post('save-wishlist', [CartController::class, 'saveCart']);
    Route::get('remove-from-cart', [CartController::class, 'removeItem']);
    Route::get('remove-from-wishlist', [CartController::class, 'removeItem']);
    Route::get('decrement-cart', [CartController::class, 'decrementCart']);
    Route::get('get-cart', [CartController::class, 'getCart']);

    Route::get('get-product-categories-and-prices', [ProductPricesController::class, 'index']);
    Route::post('save-artist-price-share', [ProductPricesController::class, 'saveArtistShareByCategory']);

    Route::post('change-password', [PasswordHandlerController::class, 'changePassword']);

    Route::get('logout', [PassportAuthController::class, 'logout']);
});

Route::get('get-all-categories', [CategoryController::class, 'getAllCategories']);

Route::get('get-featured-products', [ArtWorkController::class, 'getFeaturedProducts']);

Route::get('get-single-product', [SingleProductController::class, 'getProductBySlugAndID']);

Route::get('shop/{catSlug?}', [SearchController::class, 'searchProducts']);