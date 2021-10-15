<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminArtWorkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::group(['middleware' => ['auth']], function(){

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('abandoned-checkouts', [AdminController::class, 'abandonedCheckouts'])->name('abandoned-checkouts');

    Route::get('artworks/', [AdminArtWorkController::class, 'index'])->name('artworks');
    Route::get('artwork/{artWorkID}', [AdminArtWorkController::class, 'artWork'])->name('artwork');
    
    Route::get('collections', [AdminController::class, 'collections'])->name('collections');
    Route::get('tags', [AdminController::class, 'tags'])->name('tags');
    Route::get('customers', [AdminController::class, 'customers'])->name('customers');
    Route::get('analytics', [AdminController::class, 'analytics'])->name('analytics');
    Route::get('discounts', [AdminController::class, 'discounts'])->name('discounts');
    Route::get('preferences', [AdminController::class, 'preferences'])->name('preferences');

 });