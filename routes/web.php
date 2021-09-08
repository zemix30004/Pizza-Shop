<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\FileUploadController;
use App\Services\CurrencyConversion;
use App\Models\Currency;
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

Route::get('locale/{locale}', [MainController::class, 'changeLocale'])->name('locale');

Route::get('currency/{currencyCode}', [MainController::class, 'changeCurrency'])->name('currency');

Route::get('reset', [ResetController::class, 'reset'])->name('reset');

Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');


Route::get('/upload-file', [FileUploadController::class, 'createForm']);

Route::post('/upload-file', [FileUploadController::class, 'fileUpload'])->name('fileUpload');


Route::middleware(['set_locale'])->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::group([
            'prefix' => 'person',
            'namespace' => '',
            'as' => 'person.',
        ], function () {
            Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
            Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        });
        Route::group([
            'namespace' => '',
            'prefix' => 'admin',
        ], function () {
            Route::group(['middleware' => 'is_admin'], function () {
                Route::get('/orders', [OrderController::class, 'index'])->name('home');
                Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
                // Route::get('/place/create', [OrdetController::class, 'create'])->name('create');
                // Route::post('/place', [OrderController::class, 'store'])->name('store');
            });

            Route::resource('categories', CategoryController::class);
            Route::resource('products', ProductController::class);
        });
    });
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/categories', [MainController::class, 'categories'])->name('categories');
    Route::post('subscription/{product}', [MainController::class, 'subscribe'])->name('subscription');

    Route::group(['prefix' => 'cart'], function () {
        Route::post('/add/{product}', [CartController::class, 'cartAdd'])->name('cart-add');

        Route::group([
            'middleware' => 'cart_not_empty',
        ], function () {
            Route::get('/', [CartController::class, 'cart'])->name('cart');
            Route::get('/place', [CartController::class, 'cartPlace'])->name('cart-place');
            Route::post('/remove/{product}', [CartController::class, 'cartRemove'])->name('cart-remove');
            Route::post('/place', [CartController::class, 'cartConfirm'])->name('cart-confirm');
            // Route::get('/place/create', [CartController::class, 'create'])->name('create');
            // Route::post('/place', [CartController::class, 'store'])->name('store');
        });
    });

    Route::get('/{category}', [MainController::class, 'category'])->name('category');
    Route::get('/{category}/{product}', [MainController::class, 'product'])->name('product');
});
