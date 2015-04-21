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

Route::get('register', 'Auth\AuthController@getRegister');
Route::get('login', 'Auth\AuthController@getLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Entrust::routeNeedsPermission('list-users', 'list-users');
Route::get('list-users', 'User\UserController@getList');

Route::bind('user', function($id) {
	return App\User::find($id);
});

Entrust::routeNeedsPermission('edit-user/{user}', 'edit-user');
Route::get('edit-user/{user}', 'User\UserController@edit');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
