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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
      Route::get('/admin/products', 'ProductController@index'); // listado
      Route::get('/admin/products/create', 'ProductController@create'); // form de creacion
      Route::post('/admin/products', 'ProductController@store'); // registrar
      Route::get('/admin/products/{id}/edit', 'ProductController@edit'); // form de edicion
      Route::post('/admin/products/{id}/edit', 'ProductController@update'); // actualizar
      Route::delete('/admin/products/{id}', 'ProductController@destroy'); // form de eliminar

      Route::get('/admin/products/{id}/images', 'ImageController@index'); // lista de imagenes
      Route::post('/admin/products/{id}/images', 'ImageController@store'); // registrar
      Route::delete('/admin/products/{id}/images', 'ImageController@destroy'); // form de eliminar

});
