<?php

use App\Http\Components\ContactComponent as ComponentsContactComponent;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\FileUploadController;
use App\View\Components\ContactComponent;
use App\View\Components\AdminContactComponent;

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
            'prefix' => '',
            'namespace' => 'person',
            'as' => 'auth.'
        ], function () {
            Route::get('/orders', [App\Http\Controllers\Person\OrderController::class, 'index'])->name('orders.index');
            Route::get('/orders/{order}', [App\Http\Controllers\Person\OrderController::class, 'show'])->name('orders.show');
            // Route::post('/cancel/{order}', [App\Http\Controllers\Person\OrderController::class, 'cancelOrder'])->name('cancel-order');
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
            Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        });
        Route::group([
            'namespace' => '',
            'prefix' => 'admin',
            'as' => 'admin.'
        ], function () {
            Route::group(['middleware' => 'is_admin',], function () {
                Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
                Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
                // Route::get('/cancelorder/{order}', [OrderController::class, 'cancelOrder'])->name('order.cancelorder');
                Route::get('/ordertest/{order_id}', [OrderController::class, 'orderTest'])->name('order.ordertest');
                // Route::delete('destroy.{$id}', [OrderController::class, 'destroy'])->name('destroy');
                Route::get('/exportinexcel', [CategoryController::class, 'exportInExcel'])->name('categories.exportinexcel');
                Route::get('/exportincsv', [CategoryController::class, 'exportInCSV'])->name('categories.exportincsv');
                Route::post('/categoryimport', [CategoryController::class, 'categoryImport'])->name('categories.categoryimport');
                Route::get('/exportintoexcel', [ProductController::class, 'exportIntoExcel'])->name('products.exportintoexcel');
                Route::get('/exportintocsv', [ProductController::class, 'exportIntoCSV'])->name('products.exportintocsv');

                // Route::get('/users', [UserController::class, 'index'])->name('users.index');
                // Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

                // Route::get('/place/create', [OrderController::class, 'create'])->name('create');
                // Route::post('/place', [OrderController::class, 'store'])->name('store');
            });


            Route::resource('categories', CategoryController::class);
            Route::resource('products', ProductController::class);
            Route::resource('users', UserController::class);


            // Route::get('/', [MainController::class, 'adminIndex'])->name('admin.index');
            //            Route::get('/admin/orders', [MainController::class, 'index'])->name('admin.orders');
            Route::get('/', [OrderController::class, 'index'])->name('index');
        });
    });
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/categories', [MainController::class, 'categories'])->name('categories');
    Route::post('subscription/{product}', [MainController::class, 'subscribe'])->name('subscription');
    Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
    Route::get('/search', [MainController::class, 'search'])->name('search');

    Route::get('/contact', [ContactController::class, 'create'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact-us', [ContactController::class, 'contactUs'])->name('contact-us');
    Route::post('/contact-us', [ContactController::class, 'contactSubmit'])->name('contact.submit');


    Route::group(['prefix' => 'cart'], function () {
        Route::post('/add/{product}', [CartController::class, 'cartAdd'])->name('cart-add');

        Route::group([
            'middleware' => 'cart_not_empty',
        ], function () {
            Route::get('/', [CartController::class, 'cart'])->name('cart');
            Route::get('/place', [CartController::class, 'cartPlace'])->name('cart-place');
            Route::post('/remove/{product}', [CartController::class, 'cartRemove'])->name('cart-remove');
            Route::post('/place', [CartController::class, 'cartConfirm'])->name('cart-confirm');
            // Route::post('/cart', [CartController::class, 'orderCancel'])->name('order-cancel');
        });
    });

    Route::get('/{category}', [MainController::class, 'category'])->name('category');
    Route::get('/{category}/{product}', [MainController::class, 'product'])->name('product');
});
