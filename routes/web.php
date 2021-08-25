<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
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


Route::group([
    'middleware' => 'auth',
    'namespace' => '',
    'prefix' => 'admin',
], function () {
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/orders', 'App\Http\Controllers\Admin\OrderController@index')->name('home');
    });

    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
});

Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');
Route::group(['prefix' => 'cart'], function () {
    Route::post('/add/{id}', 'App\Http\Controllers\CartController@cartAdd')->name('cart-add');

    Route::group([
        'middleware' => 'cart_not_empty',
    ], function () {
        Route::get('/', 'App\Http\Controllers\CartController@cart')->name('cart');
        Route::get('/place', 'App\Http\Controllers\CartController@cartPlace')->name('cart-place');
        Route::post('/remove/{id}', 'App\Http\Controllers\CartController@cartRemove')->name('cart-remove');
        Route::post('/place', 'App\Http\Controllers\CartController@cartConfirm')->name('cart-confirm');
    });
});

Route::get('/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/{category}/{product?}', 'App\Http\Controllers\MainController@product')->name('product');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
