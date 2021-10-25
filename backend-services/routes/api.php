<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\PassportAuthController;
use App\Http\Controllers\Api\User\UserProfileController;
use App\Http\Controllers\Api\User\ArtWorkController;
use App\Http\Controllers\Api\User\ArtWorkMediaController;

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

    Route::post('save-art-work', [ArtWorkController::class, 'saveArtWork']);

    Route::get('get-artwork-media', [ArtWorkMediaController::class, 'getArtWorkMedia']);
    Route::get('get-designs-count', [ArtWorkMediaController::class, 'returnCountOfTotalArts']);

    Route::get('logout', [PassportAuthController::class, 'logout']);

});
