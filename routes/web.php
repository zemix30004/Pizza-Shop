<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CartController;
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


Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('reset', 'App\Http\Controllers\ResetController@reset')->name('reset_db');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');

Route::middleware(['auth'])->group(function () {
    Route::group([
        'prefix' => 'person',
        'namespace' => '',
        'as' => 'person.',
    ], function () {
        Route::get('/orders', 'App\Http\Controllers\Admin\OrderController@index')->name('orders.index');
        Route::get('/orders/{order}', 'App\Http\Controllers\Admin\OrderController@show')->name('orders.show');
    });
    Route::group([
        'namespace' => '',
        'prefix' => 'admin',
    ], function () {
        Route::group(['middleware' => 'is_admin'], function () {
            Route::get('/orders', 'App\Http\Controllers\Admin\OrderController@index')->name('home');
            Route::get('/orders/{order}', 'App\Http\Controllers\Admin\OrderController@show')->name('orders.show');
        });

        Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
        Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
    });
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
