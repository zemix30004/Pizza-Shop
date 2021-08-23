<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;

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



// Route::get('/', function () {

//     return view('index');
// });
Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);
// Route::get('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('get-login');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
});

Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');

Route::get('/cart', 'App\Http\Controllers\CartController@cart')->name('cart');
Route::get('/cart/place', 'App\Http\Controllers\CartController@cartPlace')->name('cart-place');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@cartAdd')->name('cart-add');
Route::post('/cart/remove/{id}', 'App\Http\Controllers\CartController@cartRemove')->name('cart-remove');
Route::post('/cart/place', 'App\Http\Controllers\CartController@cartConfirm')->name('cart-confirm');

Route::get('/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/{category}/{product?}', 'App\Http\Controllers\MainController@product')->name('product');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
