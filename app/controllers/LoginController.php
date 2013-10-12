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
			return Response::make(View::make('login'), 200, $this->getHeaderToDisableCache());
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
	
	private function getHeaderToDisableCache()
	{
		$headers = array();
                $headers['Expires'] = 'Tue, 1 Jan 1980 00:00:00 GMT';
                $headers['Cache-Control'] = 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0';
                $headers['Pragma'] = 'no-cache';
		return $headers;
	}
} 
