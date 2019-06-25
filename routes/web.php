<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'roles']], function () {

	// Rutas para Admin.Users
	Route::get('/users/json', 'UserController@dataConvertJson'); // Devuelve un Json de usuarios
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

	// Rutas para Admin.Categories
	Route::get('/categories', 'CategoryController@index'); // listado de categorias
	Route::get('/categories/create', 'CategoryController@create'); // Muestra el formulario de registro de categorias
	Route::post('/categories', 'CategoryController@store'); // Registra la nueva categoria
	Route::get('/categories/{id}/edit', 'CategoryController@edit'); // Muestra el formulario de edicion de una categoria
	Route::post('/categories/{id}/edit', 'CategoryController@update'); // Actualiza la categoria
	Route::delete('/categories/{id}', 'CategoryController@delete'); // elimina la categoria

	// Rutas para Admin.Discount Codes
	Route::get('/discount_codes', 'DiscountCodesController@index'); // listado de cupones
	Route::get('/discount_codes/create', 'DiscountCodesController@create'); // Muestra el formulario de registro de cupones
	Route::post('/discount_codes', 'DiscountCodesController@store'); // Registra el nuevo cupon de descuento
	Route::get('/discount_codes/{id}/edit', 'DiscountCodesController@edit'); // Muestra el formulario de edicion de los cupones de descuento
	Route::post('/discount_codes/{id}/edit', 'DiscountCodesController@update'); // Actualiza el cupon
	Route::delete('/discount_codes/{id}', 'DiscountCodesController@delete'); // elimina el cupon

	// Rutas para Admin.Subscriptions
	Route::get('/subscriptions', 'SubscriptionsController@index'); // listado de suscripciones
	Route::get('/subscriptions/create', 'SubscriptionsController@create'); // Muestra el formulario de registro de suscripciones
	Route::post('/subscriptions', 'SubscriptionsController@store'); // Registra una nueva suscripcion
	Route::get('/subscriptions/{id}/edit', 'SubscriptionsController@edit'); // Muestra el formulario de edicion de la suscripcion
	Route::post('/subscriptions/{id}/edit', 'SubscriptionsController@update'); // Actualiza la suscripcion
	Route::delete('/subscriptions/{id}', 'SubscriptionsController@delete'); // elimina la suscripcion

	// Rutas para las direcciones del usuario
	Route::post('/users/{user_id}/address/create', 'AddressController@store'); // Registra la nueva direccion del usuario
	Route::get('/users/{user_id}/address/create', 'AddressController@create'); // Muestra el formulario de creación de la nueva direccion del usuario
	Route::get('/users/{id}/address/edit', 'AddressController@edit'); // muestra el formulario de edicion de la direccion de usuario
	Route::patch('/users/{id}/address/edit', 'AddressController@update'); // Actualiza la direccion del usuario
	Route::delete('/users/{id}/address/delete', 'AddressController@delete'); // Borra la direccion del usuario

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