<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

// app/controllers/LoginController

class LoginController extends BaseController
{
	public function login()
	{
		$data = Input::all();
		
		if (Auth::attempt(array('email' => $data['email'], 'password' => $data['password'])))
		{
			return Redirect::intended('profile');
		} else {
			return Redirect::intended('login');
		}
	}
} 