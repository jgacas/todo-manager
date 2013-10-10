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

/*
 * Home application route. User must be authenticated to access the route. 
 */
Route::get('/', array('as' => 'home', 'before' => 'auth', function()
{
	return View::make('home');
}));

/*
 * Routes for login, logout and for processing login.
 */
Route::get('login', 'LoginController@login');

Route::get('logout', 'LoginController@logout');

Route::post('processLogin', array(
	'before' => 'csrf', 
	'uses' => 'LoginController@processLogin'
));


