<?php

/*a
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/productos/agregar', 'ProductsController@create');
Route::post('/productos/agregar', 'ProductsController@store');

Route::get('/productos/{id}', 'ProductsController@show');

Route::get('/productos', function () {
    return view('productos');
});
