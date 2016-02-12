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
/*
 * Pruebas de enrutamiento 
 * 
Route::get('controlador','PruebaController@index');
Route::get('name/{nombre}','PruebaController@nombre');
Route::resource('vinilshirt','VinilController');
 * 
Route::get('prueba', function(){
   return "hola desde routes.php"; 
});
Route::get('nombre/{nombre}', function($nombre){
    return "mi nombre es ".$nombre;
});
Route::get('nombre/{nombre?}', function($nombre = 'Perico'){
    return "mi nombre es ".$nombre;
});
*/
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('vinil', function($name = 'Perico', $confirmation_code = '123213'){
    return view('emails.verify',compact('name', 'confirmation_code'));
});

Route::controllers([
	'auth' 		=> 'Auth\AuthController',
	'password' 	=> 'Auth\PasswordController',
	'producto'	=> 'productoController',
]);





/*
Route::get('/', 'FrontController@index');
Route::get('contacto', 'FrontController@contacto');

Route::resource('usuario', 'UsuarioController');
 * 
 */

