<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('orders', 'OrderController@getList')->name('orders');
Route::get('orders/{uuid}', 'OrderController@get')->name('order_get');
Route::post('orders', 'OrderController@store')->name('order_store');
Route::patch('orders/{uuid}', 'OrderController@update')->name('order_update');
Route::delete('orders/{uuid}', 'OrderController@destroy')->name('order_destroy');

Route::get('accounts', 'AccountController@getList')->name('accounts');
Route::get('accounts/{uuid}', 'AccountController@get')->name('account_get');

Route::get('products', 'ProductController@getList')->name('products');
Route::get('products/{uuid}', 'ProductController@get')->name('product_get');
