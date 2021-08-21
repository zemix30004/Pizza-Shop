<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', 'App\Http\Controllers\MainController@index');
Route::get('/categories', 'App\Http\Controllers\MainController@categories');
Route::get('/{category}', 'App\Http\Controllers\MainController@category');
Route::get('/pizzas/{product?}', 'App\Http\Controllers\MainController@product');
