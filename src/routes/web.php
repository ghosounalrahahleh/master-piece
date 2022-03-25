<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
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
use App\Http\Controllers\UserProfileController;
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

Route::get('/checkOut/completed', function () {
    return view('publicSite.order');
});
//public site routes
Route::get('/', [ LandingController::class, 'index'])->name('home');


Route::resource('/userProfile', UserProfileController::class);
Route::get( '/AllCategories', [CategoryController::class, 'categories'])->name('allCategories');
Route::get('/product/{id}', [ ProductController::class, 'productShow'])->name('singleProduct');
Route::get('/Category/{id}', [ CategoryController::class, 'CategoryShow'])->name('singleCategory');
Route::get('/JoinUs', [OwnerInfoController::class, 'JoinUs'])->name('JoinUs');
Route::post('/JoinUs', [ OwnerInfoController::class, 'joinStore'])->name('JoinStore');
Route::post('/comment', [CommentController::class, 'addComment'])->name('addComment');
// addresses routes
Route::get('/UserAddress', [ UserProfileController::class, 'GetUserAddress'])->name('UserAddress');
Route::post( '/UserAddress/store', [UserProfileController::class, 'create'])->name('UserAddress.create');
Route::get( '/UserAddress/show', [UserProfileController::class, 'show'])->name('UserAddress.show');
Route::get('/UserAddress/edit/{id}', [ UserProfileController::class, 'editAddress'])->name('editAddress');
Route::post('/UserAddress/update/{id}', [UserProfileController:: class, 'updateAddress'])->name('updateAddress');
Route::get('/UserOrders', [UserProfileController::class, 'GetUserOrders'])->name('UserOrders');
Route::get('/UserOrders/details/{id}', [UserProfileController::class, 'viewDetails'])->name('viewDetails');
//cart
Route::get('/Empty-Cart', function(){ return view('publicSite.empty');})->name('emptyCart');
Route::resource('cart', CartController::class);
Route::post('cart/update', [CartController::class, 'update'])->name('updateCart');
//check out routes
Route::get('/checKOut', [ CartController::class, 'viewCheckOut'])->name('viewCheckOut');
Route::post('/checKOut', [CartController::class, 'CheckOut'])->name('CheckOut');

//search
Route::get('/search', SearchController::class)->name('search');

Route::get('/About', function () {
    return view('publicSite.about');
});

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
});
Route::get('admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('is_admin');
Route::get('owner/dashboard', [HomeController::class, 'ownerDashboard'])->name('owner.dashboard')->middleware('is_owner');


//Authentication Route
Auth::routes();

//Admin Route
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
