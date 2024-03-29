<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::prefix('/')->controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/setlanguage/{language}', 'setlanguage')->name('setlanguage');
});
Route::prefix("/customer")->controller(AccountController::class)->group(function () {
    Route::get('/profile', 'profile')->name('account-index')->middleware('auth');
    Route::post('/signup', 'signup')->name('signup');
    Route::post('/login', 'login')->name('login');
    Route::get('/login', 'login_page')->name('login-page');
    Route::post('/editProfile', 'editProfile')->name('editProfile');
    Route::post('/changeImage', 'changeImage')->name('changeImage');
    Route::get('/logout', 'logout')->name('logout');
});
Route::prefix('/product')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/product/{id?}', 'showall')->name('productCategory');
    Route::get('detail/{id?}', 'detail')->name('detailProduct');
    Route::get('settingaddress', 'settingAddress')->name('settingAddress')->middleware('check.login');
    Route::post('updateaddress', 'updateAddress')->name('updateAddress')->middleware('check.login');
    Route::get('youcart', 'youcart')->name('youCart')->middleware('check.login');
    Route::post('youcart', 'storeOrder')->name('storeOrder')->middleware('check.login');
    Route::post('updatecart', 'updateCart')->name('updateCart');
    Route::post('removecart', 'removeCart')->name('removeCart');
    Route::post('payment', 'payment')->name('payment')->middleware('check.login');
    Route::get('payment', 'getPayment')->name('getPayment')->middleware('check.login');
    Route::post('addcart', 'addCart')->name('addCart');
    Route::post('buytocart', 'buyToCart')->name('buyToCart');
    Route::get('removebuytocart', 'removeBuyToCart')->name('removeBuyToCart');
});
Route::prefix('/')->controller(OrderController::class)->group(function () {
    Route::get('order', 'order')->name('order');
    Route::get('userorder', 'userOrder')->name('userOrder');
});
Route::prefix('')->controller(AdminController::class)->group(function () {
    Route::get('admin', 'index')->name('indexAdmin')->middleware('auth');
    Route::post('addmember', 'addMember')->name('addMember');
    Route::post('revomemember', 'revomeMember')->name('revomeMember');
});
