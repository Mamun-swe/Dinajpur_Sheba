<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WebsiteController@index')->name('home');

Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@registration')->name('registration');
Route::get('/login', 'AuthController@loginView')->name('login');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/reset', 'AuthController@resetView')->name('reset');

Route::post('/logout', 'AuthController@logout')->name('logout');



// Admin Routes
Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard');
    Route::resource('/co-admin', 'Admin\CoAdminController');
    Route::resource('/seller', 'Admin\SellerController');
    Route::resource('/product', 'Admin\ProductController');
    Route::resource('/product-type', 'Admin\ProductTypeController');
    Route::resource('/loading-point', 'Admin\LoadingPointsController');
    Route::get('/me', 'Admin\MeController@index')->name('me');
    Route::put('/me', 'Admin\MeController@update')->name('me.update');

    Route::get('/buyers', 'Admin\AdminController@buyerIndex')->name('buyers');
    Route::get('/orders', 'Admin\AdminController@orderIndex')->name('orders');
    Route::get('/order/{id}', 'Admin\AdminController@orderShow')->name('order');
    Route::put('/approve', 'Admin\AdminController@arrproveOrder')->name('approveorder');
});


// Buyer Routes
Route::group(['prefix'=>'buyer','as'=>'buyer.', 'middleware' => ['auth', 'buyer']], function () {
    Route::get('/products', 'WebsiteController@products')->name('products');
    Route::get('/products-all/{productType}', 'WebsiteController@allProducts')->name('productall');
    Route::get('/product-single/{id}', 'WebsiteController@productShow')->name('product');
    Route::get('/checkout/{id}', 'WebsiteController@checkout')->name('checkout');
    Route::post('/order-submit', 'WebsiteController@orderSubmit')->name('ordersubmit');
    Route::post('/search', 'WebsiteController@searchProduct')->name('search');

    Route::get('/account', 'User\AccountController@Account')->name('account');
    Route::put('/account', 'User\AccountController@Update')->name('account');

    Route::get('/orders', 'User\OrderController@index')->name('orders');
});