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
	Route::delete('/users/{id}', 'UserController@delete'); // elimina el usuario

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');