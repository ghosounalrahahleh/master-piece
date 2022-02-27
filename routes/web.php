<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OwnerInfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ownerDashboardController;
use App\Http\Controllers\OwnerOrderController;
use App\Http\Controllers\OwnerCommentController;
use App\Http\Controllers\OwnerProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;;
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

Route::get('/land', function () {
    return view('home');
});
//public site routes
Route::get('/', [LandingController::class, 'index'])->name('Land');

Route::group(['middleware' => 'redirect'], function () {
    //Main Dashboard Page
    Route::resource('statics', AdminDashboardController::class);
    //Admin Dashboard Users Routes
    Route::resource('users', UserController::class);
    //Admin Dashboard Roles Routes
    Route::resource('roles', RoleController::class);
    //Admin Dashboard Categories Routes
    Route::resource('categories', CategoryController::class);
    //Admin Dashboard Products Routes
    Route::resource('products', ProductController::class);
    //Admin Dashboard Orders Routes
    Route::resource('orders', OrderController::class);
    //Admin Dashboard Order-details Routes
    Route::resource('ordersDetails', OrderDetailController::class);
    //Admin Dashboard Addresses Routes
    Route::resource('addresses', AddressController::class);
    //Admin Dashboard Comments Routes
    Route::resource('comments', CommentController::class);
    //Admin Dashboard OWnerInfo
    Route::resource('owners', OwnerInfoController::class);
    //profile
    Route::resource('profiles', ProfileController::class);
    //search
    Route::get('/search', SearchController::class)->name('search');
});
Route::get('admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('is_admin');
Route::get('owner/dashboard', [HomeController::class, 'ownerDashboard'])->name('owner.dashboard')->middleware('is_owner');



//Authentication Route
Auth::routes();

//Admin Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
