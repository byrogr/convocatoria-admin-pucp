<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function() {
	return redirect('/acceso');
});

// Rutas para la autenticación
Route::get('acceso', [
	'uses' => 'Auth\AuthController@getLogin',
	'as'   => 'login'
]);

Route::post('acceso', 'Auth\AuthController@postLogin');

Route::get('logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as'   => 'logout'
]);


// Rutas de la sección de administrador
Route::group(['prefix' => 'administrador'], function() {

	Route::get('/', function() {
		return redirect()->intended('/administrador/escritorio');
	});

	Route::get('/escritorio', [
		'uses' => 'MovieController@showEscritorio',
		'as'   => 'escritorio'
	]);

	Route::get('/peliculas', [
		'uses' => 'MovieController@showPeliculas',
		'as' => 'peliculas'
	]);
});

// Rutas para envío de email
Route::post('send', [
	'as' => 'send',
	'uses' => 'MailController@send'
]);