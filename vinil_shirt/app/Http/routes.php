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

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::get('producto/{id}', 'productoController@productos');
Route::get('producto/{id}/sort', 'productoController@sort');
Route::get('producto/{id}/descripcion', 'productoController@descripcion');
Route::get('search', 'productoController@search');

Route::get('perfil', 'profileController@getProfile');
Route::get('perfil/editar', 'profileController@editProfile');
Route::get('perfil/editar/save', 'profileController@saveProfile');
Route::get('perfil/editar/delete', 'profileController@deleteProfile');


Route::get('tienda', 'soapController@index');



Route::get('register/verify/{confirmationCode?}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@confirm'
]);



Route::get('vinil', function($name = 'Perico', $confirmation_code = '123213'){
    return view('emails.verify',compact('name', 'confirmation_code'));
});

Route::controllers([
	'auth' 		=> 'Auth\AuthController',
	'password' 	=> 'Auth\PasswordController',
	'producto'	=> 'productoController',
]);





