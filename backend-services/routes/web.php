<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminArtWorkController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\ProductsController;

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
    Route::get('collections', [AdminController::class, 'collections'])->name('collections');
    Route::get('tags', [AdminController::class, 'tags'])->name('tags');
    Route::get('customers', [AdminController::class, 'customers'])->name('customers');
    Route::get('analytics', [AdminController::class, 'analytics'])->name('analytics');
    Route::get('discounts', [AdminController::class, 'discounts'])->name('discounts');
    Route::get('preferences', [AdminController::class, 'preferences'])->name('preferences');

    Route::get('artworks/', [AdminArtWorkController::class, 'index'])->name('artworks');
    Route::get('artwork/{artWorkID}', [AdminArtWorkController::class, 'artWork'])->name('artwork');

    Route::post('update-approval-of-artwork', [ApprovalController::class, 'approveAndDisApproveArtWork'])->name('update-approval-of-artwork');

    Route::get('products', [ProductsController::class, 'getProducts'])->name('products');
    Route::get('add-new-product', [ProductsController::class, 'addNewProduct'])->name('add-new-product');
    Route::post('save-product', [ProductsController::class, 'saveProduct'])->name('save-product');
    Route::get('product/update/{product_id}', [ProductsController::class, 'updateProduct'])->name('update-product');
    Route::get('product/delete/{product_id}', [ProductsController::class, 'deleteProduct'])->name('delete-product');
 });