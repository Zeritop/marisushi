<?php

use Illuminate\Http\Request;

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

Route::resource('menu','ApiMeenuController');
Route::get('/addToCart/{menu}', 'ApiMeenuController@addToCart')->name('cart.add');
Route::get('/shopping-cart', 'ApiMeenuController@showCart')->name('cart.show');
Route::delete('/menu/{menu}', 'ApiMeenuController@destroy')->name('menu.destroy');
Route::put('/menu/{menu}', 'ApiMeenuController@update')->name('menu.update');
Route::get('/detalles', 'ApiMeenuController@detallesCart')->name('cart.detalles');
Route::post('/storeCart', 'ApiMeenuController@storeCart')->name('cart.store');
    //->middleware('verified');

Route::get('/home', 'ApiHomeController@index')->name('home');
Route::resource('admin/orders','ApiOrderController');

