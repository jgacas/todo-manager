<?php

// app/controllers/LoginController

class LoginController extends BaseController
{
	public function login()
	{
		if (Auth::check()) 
		{
			
			return Redirect::route('home');	
		} 
		else
		{
			return View::make('login');
		}
	
	}
	
	public function logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}
	
	public function processLogin()
	{
		$userdata = array(
			'email' 	=> Input::get('email'),
			'password'	=> Input::get('password')
		);
		
		if (Auth::attempt($userdata))
		{
			return Redirect::route('home');
		} 
		else 
		{
			return Redirect::to('login')->with('login_errors', true);
		}
	}
	
} 