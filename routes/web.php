<?php

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

Route::get('/', function () {
    return view('index');
});
Route::get('about', function () {
    return view('about');
});
/*Route::get('menu', function () {
    return view('menu');
});*/

/*Route::get('contact', function () {
    return view('contact');
});
*/

Route::get('administrador', function () {
    return view('administrador/index');
});

/*Route::get('/add-to-cart/{id}'[
    'uses' => 'MenuController@getAddToCart', 
    'as'  => 'menu.addToCart' 
]);*/

Route::get('/addToCart/{menu}', 'MeenuController@addToCart')->name('cart.add');
Route::get('/shopping-cart', 'MeenuController@showCart')->name('cart.show');
Route::delete('/menu/{menu}', 'MeenuController@destroy')->name('menu.destroy');
Route::put('/menu/{menu}', 'MeenuController@update')->name('menu.update');

Auth::routes(['verify' => true]);

Route::resource('/contacto','ContactController');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@subscribe')->name('home.subscribe');

Route::get('/unsubscribe', 'UnsubscribeController@index')->name('unsubscribe');
Route::post('/unsubscribe', 'UnsubscribeController@unsubscribe')->name('unsubscribe.unsubscribe');


Route::resource('admin/products','ProductController');
Route::resource('admin/ingredients','IngredientController');
Route::resource('admin/discounts','DiscountController');

Route::resource('admin/orders','OrderController');

Route::post('admin/orders/{id}','OrderController@agregarItem')->name('orders.agregarItem');
Route::post('admin/orders}','OrderController@quitarItem')->name('orders.quitarItem');



Route::resource('menus','MenuController');//admin
Route::resource('menu','MeenuController');

Route::resource('personalizar','PersonalizarController');

//Route::resource('/contacto','ContactController')->middleware('verified'); ejemplo para verificacion de email requerida