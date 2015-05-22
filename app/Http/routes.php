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

Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
	],
	function()
	{
		Route::get('pokerhand/create', 'PokerhandController@create');
	});

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

Route::get('view-user/{user}', 'User\UserController@view');

Route::get('edit-user/{user}', 'User\UserController@edit');
Route::patch('update-user/{user}', 'User\UserController@update');

Route::get('delete-user/{user}', 'User\UserController@delete');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('pokerhand', 'PokerhandController', ['except' => ['create']]);