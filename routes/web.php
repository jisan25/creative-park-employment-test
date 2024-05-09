<?php

use App\Http\Controllers\Admin\UploadImageController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();



Route::group(['middleware' => 'user.type.check'], function () {
    // Routes that require user type check
});
Route::middleware(['auth', 'user.is.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
    Route::get('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
    Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
    Route::post('/category-store', [App\Http\Controllers\HomeController::class, 'categoryStore'])->name('category.store');
    Route::post('/upload-profile-image', [UploadImageController::class, 'uploadProfileImage'])->name('upload.profile.image');
    Route::post('/products-store', [App\Http\Controllers\HomeController::class, 'productStore'])->name('products.store');
});

Route::middleware(['auth', 'user.is.vendor'])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/profile', [VendorController::class, 'index'])->name('profile');
    Route::get('/category', [VendorController::class, 'category'])->name('category');
    Route::get('/products', [VendorController::class, 'products'])->name('products');
});

Route::middleware(['auth', 'user.is.customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/profile', [CustomerController::class, 'index'])->name('profile');
    Route::get('/category', [CustomerController::class, 'category'])->name('category');
    Route::get('/products', [CustomerController::class, 'products'])->name('products');
});
