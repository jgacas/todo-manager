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

/**
 * Home application route. User must be authenticated to access it. 
 */
Route::get('/', array('as' => 'home', 'before' => 'auth', function()
{
	return View::make('home');
}));

/**
 * Route that handles user login process.
 */
Route::get('login', array(
	'before'	=> 'guest', // if user is authenticated send her/him home
	'as' 		=> 'login',
	'uses' 		=> 'LoginController@login'
));

/**
 * Route that handles user logout.
 */
Route::get('logout', 'LoginController@logout');

/**
 * Route that handles user login process.
 */
Route::post('processLogin', array(
	'before' 	=> 'csrf', 
	'uses' 		=> 'LoginController@processLogin'
));

/**
 * Route that handles user registration form.
 */
Route::get('register', array(
	'as' 	=> 'register',
	'uses'	=> 'RegisterController@register'
));

/** 
 * Route that handles user registration process.
 */
Route::post('processRegistration', array(
	'before'	=> 'csrf',
	'as'		=> 'processRegistration',
	'uses'		=> 'RegisterController@processRegistration'
));

/**
 * Route to the REST API that handles todo list.
 */
Route::resource('todos', 'TodoController', array(
	'only' => array('index', 'store', 'update', 'destroy')
));