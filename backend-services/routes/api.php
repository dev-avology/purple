<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\PassportAuthController;
use App\Http\Controllers\APi\User\UserProfileController;

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
    Route::get('logout', [PassportAuthController::class, 'logout']);

});
