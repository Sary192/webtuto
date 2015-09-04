<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Pagina principal donde está el formulario de identificación
Route::get('/', ['before' => 'guest', function(){
    return View::make('auth.login');
}]);

//Llamadas al controlador Auth, procesa el formulario e identifica al usuario
Route::post('/login', ['uses' => 'AuthController@doLogin', 'before' => 'guest']);
//Finalizar sesion
Route::get('/logout', ['uses' => 'AuthController@doLogout', 'before' => 'auth']);

Route::controller('users', 'UserController');

Route::controller('main', 'MainController');

Route::controller('admin', 'AdminController', ['before' => 'admin']);

/*
Route::get('/register', ['before' => 'guest', function(){
    return View::make('users.register');
}]);

//Rutas privadas solo para usuarios autenticados
Route::get('/home', ['before' => 'auth', function(){
    return View::make('main.home');
}]);
Route::get('/teoria', ['before' => 'auth', function(){
    return View::make('main.teoria');
}]);

Route::controller('/users', 'UserController');

Route::post('/register', ['uses' => 'UserController@postRegister', 'before' => 'guest']);

Route::get('/admin_users', ['uses' => 'AdminController@getUsers', 'before' => 'admin']);*/


