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

Auth::routes();

Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/productos', 'ProductsController@index')->name("productos");
Route::get('/productos/agregar', 'ProductsController@create');
Route::post('/productos/agregar', 'ProductsController@store');
Route::get('/productos/{id}', 'ProductsController@show');
Route::get('/productos/{id}/edit', 'ProductsController@edit');
Route::patch('/productos/{id}', 'ProductsController@update');
Route::delete('/productos/{id}/edit', 'ProductsController@destroy');
