<?php

use App\Http\Controllers\Admin\Attributes\AttributeController;
use App\Http\Controllers\Admin\Banners\BannerController;
use App\Http\Controllers\Admin\Brands\BrandController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Products\ProductImageController;
use App\Http\Controllers\Admin\Tags\TagController;
use App\Http\Controllers\Admin\Comments\CommentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\Categories\CategoryController as HomeCategoryController;
use App\Http\Controllers\Home\Products\ProductController as HomeProductController;
use App\Http\Controllers\Home\Comments\CommentController as HomeCommentController;

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

// Admin Routes
Route::get('admin-panel/dashboard',[DashboardController::class , 'index'])->name('dashboard');

Route::prefix('admin-panel/managment')->name('admin.')->group(function ()
{
    Route::resource('brands', BrandController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('products', ProductController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('comments', CommentController::class);

    // Edit Product Images
    Route::get('/products/{product}/images-edit' , [ProductImageController::class , 'edit'])->name('products.images.edit');
    Route::delete('/products/{product}/images-destroy' , [ProductImageController::class , 'destroy'])->name('product.images.destroy');
    Route::put('/products/{product}/images-set-primary' , [ProductImageController::class , 'setPrimary'])->name('product.images.set_primary');

    // Edit Product Category
    Route::get('/products/{product}/category-edit' , [ProductController::class , 'editCategory'])->name('products.category.edit');
    Route::put('/products/{product}/category-update' , [ProductController::class , 'updateCategory'])->name('products.category.update');
});

/*--------------------------------------------------------------------*/

// Home Route
Route::get('/' , [HomeController::class , 'index'])->name('home.index');
Route::get('/categories/{category:slug}' , [HomeCategoryController::class , 'show'])->name('home.categories.show');
Route::get('/products/show/{product:slug}' , [HomeProductController::class , 'show'])->name('home.products.show');
Route::get('/products/show/{product:slug}' , [HomeProductController::class , 'show'])->name('home.products.show');
Route::post('/comments/{product}' , [HomeCommentController::class , 'store'])->name('home.comments.store');

/****************** Auth Routes ***********************************/
Route::get('/auth' , [AuthController::class , 'index'])->name('auth.index');
Route::post('/register' , [RegisterController::class , 'register'])->name('auth.register');
Route::post('/login' , [LoginController::class , 'login'])->name('auth.login');
Route::post('/check-otp' , [LoginController::class , 'checkOtp'])->name('auth.checkOTP');
Route::post('/resend-otp' , [LoginController::class , 'resendOTP'])->name('auth.resendOTP');
Route::post('/check-user-reset-password' , [ResetPasswordController::class , 'checkUserForResetPassword'])->name('auth.checkUser.resetPass');
Route::post('/check-otp-reset-password' , [ResetPasswordController::class , 'checkOtpResetPass'])->name('auth.checkOTP.resetPass');
Route::post('/resend-otp-reset-password' , [ResetPasswordController::class , 'resendOTPResetPass'])->name('auth.resendOTP.resetPass');
Route::post('/change-password' , [ResetPasswordController::class , 'changePassword'])->name('auth.change.password');

Route::get('/test' , function (){

  Illuminate\Support\Facades\Auth::logout();
});

