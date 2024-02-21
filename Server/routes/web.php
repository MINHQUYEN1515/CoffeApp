<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
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
    Route::get('/', 'index');
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
});
