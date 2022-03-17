<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminArtWorkController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CustomerManagementController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\ProductDetailController;

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
})->middleware('guest');

Route::group(['middleware' => ['auth']], function() {
    Route::get('product-detail', [ProductDetailController::class, 'index'])->name('product-detail');
});


Route::group(['middleware' => ['auth']], function(){

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('abandoned-checkouts', [AdminController::class, 'abandonedCheckouts'])->name('abandoned-checkouts');    
    Route::get('tags', [AdminController::class, 'tags'])->name('tags');

    Route::get('collections', [CollectionController::class, 'index'])->name('collections');
    Route::get('collections/add', [CollectionController::class, 'add'])->name('collections.add');
    Route::post('collections/save', [CollectionController::class, 'save'])->name('collections.save');
    Route::get('collections/edit/{collection_id}', [CollectionController::class, 'edit'])->name('collections.edit');
    Route::post('collections/update', [CollectionController::class, 'update'])->name('collections.update');
    Route::get('collections/delete/{collection_id}', [CollectionController::class, 'destroy'])->name('collections.delete');
    
    Route::get('suspended-customers', [CustomerManagementController::class, 'getSuspendedUsers'])->name('suspended-customers');
    Route::get('unsuspend-user/{userID}', [CustomerManagementController::class, 'unsuspendUser'])->name('unsuspend-user');
    Route::get('customers', [CustomerManagementController::class, 'index'])->name('customers');
    Route::get('delete-customer/{userID}', [CustomerManagementController::class, 'delete'])->name('delete-customer');
    Route::get('buyer/{userID}/{userName}', [CustomerManagementController::class, 'viewBuyerCustomer'])->name('view-buyer-customer');
    Route::get('seller/{userID}/{userName}', [CustomerManagementController::class, 'viewSellerCustomer'])->name('view-seller-customer');
    Route::get('edit-seller/{userID}/{role}/{userName}', [CustomerManagementController::class, 'edit'])->name('edit-seller');
    Route::post('update-seller/', [CustomerManagementController::class, 'update'])->name('update-seller');
    
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