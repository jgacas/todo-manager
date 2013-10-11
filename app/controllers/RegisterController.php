<?php

// app/controllers/RegisterController

class RegisterController extends BaseController
{
	public function register()
	{
		if (Auth::check())
		{
			return Redirect::route('home');
		}
		else
		{
			return View::make('register');
		}
	}
	
	public function processRegistration()
	{
		$userdata = Input::all();
		// validate
		$validator = $this->getValidator($userdata);
		if ($validator->fails())
		{
			return Redirect::to('register')->withErrors($validator)->withInput();
		}
		$user = User::create($userdata);
		Auth::loginUsingId($user->getAuthIdentifier());
		
		return Redirect::route('home');			
	}
	
	private function getValidator($userdata)
	{
		return Validator::make(
			array(
				'email' 				=> $userdata['email'],
				'password'				=> $userdata['password'],
				'password_confirmation'	=> $userdata['password_confirmation'],
				'first_name'			=> $userdata['first_name'],
				'last_name'				=> $userdata['last_name']
			),
			array (
				'email'			=> 'required|email|unique:users,email',
				'password'		=> 'required|alphanum|min:6|regex:/(\d)/|confirmed',
				'first_name'	=> 'required|alpha',
				'last_name'		=> 'required|alpha'
			)
		);
	}
	
}