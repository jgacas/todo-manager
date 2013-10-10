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
		// collect input data
		$userdata = array(
			'email' 	=> Input::get('email'),
			'password'	=> Input::get('password')
		);

		// validate userdata
		$validator = Validator::make(
			array(
				'email' => $userdata['email'],
				'password' =>$userdata['password']
			),
			array(
				'email' => 'required|email',
				'password' => 'required|min:8'
			)
		);
		if ($validator->fails())
		{
			return Redirect::to('login')->withErrors($validator);
		}
		
		// user authentication
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