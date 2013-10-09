<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('test', function() 
{
	return 'ToDo Manager!';
});

Route::any('test/jg', function()
{
	return 'ToDo Manager by JG!';
});

Route::get('test/print', function()
{
	return URL::to('test/print');
});
/*
Route::get('user/{id}', function($id)
{
	return 'User '.$id;
});
*/

/* Registering Sub-Domain Routes */
Route::group(array('domain' => '{account}.todomanager.local'), function()
{
	Route::get('user/{id}', function($account, $id)
	{
		return 'User account '.$account.', id '.$id;
	});
});

/* Prefixing grouped routes */
Route::group(array('prefix' => 'admin'), function()
{
	Route::get('user', function()
	{
		return 'Admin user with prefix!';
	});
});

/* Route that uses Greeting Controller */
Route::get('greeting', 'GreetingController@showGreeting');

/* Route that creates 'users' table in the todo_manager database */
Route::get('create/users', function()
{
	Schema::create('users', function($table)
	{
		$table->increments('id');
		$table->string('first_name', 20);
		$table->string('last_name', 20);
		$table->string('password', 60);
		$table->string('email', 320);
	});
});

Route::get('drop/users', function()
{
	Schema::drop('users');
});

/* route to example blade template */
Route::get('example/{squirrel}', function($squirrel)
{
	$data['squirrel'] = $squirrel;
	return View::make('example', $data);
});

/* route to login blade template */
Route::get('login', function()
{
	return View::make('login');
});

Route::post('processLogin', 'LoginController@login');

/* protect route 'profile' */
Route::get('profile', array('before' => 'auth', function()
{
	return 'Welcome to ToDo Manager';
}));
