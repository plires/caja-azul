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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

	// Rutas para Admin.Users
	Route::get('/users', 'UserController@index'); // listado de usuarios
	Route::get('/users/create', 'UserController@create'); // Muestra el formulario de registro
	Route::post('/users', 'UserController@store'); // Registra el nuevo usuario
	Route::get('/users/{id}/edit', 'UserController@edit'); // Muestra el formulario de edicion del usuario
	Route::post('/users/{id}/edit', 'UserController@update'); // Actualiza el usuario
	Route::get('/users/{id}/show', 'UserController@show'); // Muestra el usuario
	Route::delete('/users/{id}', 'UserController@delete'); // elimina el usuario

	// Rutas para Admin.Products
	Route::get('/products', 'ProductController@index'); // listado de productos
	Route::get('/products/create', 'ProductController@create'); // Muestra el formulario de registro de un producto
	Route::post('/products', 'ProductController@store'); // Registra el nuevo producto
	Route::get('/products/{id}/edit', 'ProductController@edit'); // Muestra el formulario de edicion de un producto
	Route::post('/products/{id}/edit', 'ProductController@update'); // Actualiza el productos
	Route::get('/products/{id}/show', 'ProductController@show'); // Muestra el productos
	Route::delete('/products/{id}', 'ProductController@delete'); // elimina el productos

	// Rutas para las imagenes del producto
	// Route::get('/products/{id}/images', 'ImageController@index'); // listado de las imagenes del productos
	Route::post('/products/{id}/images', 'ImageController@store'); // Registra la nueva imagenes del producto
	Route::delete('/products/{id}/images', 'ImageController@delete'); // elimina la imagen del producto
	// Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); // destacar imagenes de productos

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');