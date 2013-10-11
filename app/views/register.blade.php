@extends('layouts.master')

<!-- app/views/register.blade.php -->

@section('content')

{{ Form::open(array('action' => 'RegisterController@processRegistration')) }}

	<h2>Register</h2>
	
	<!-- validator errors -->
	<p>{{ $errors->first('email') }}</p>
	<p>{{ $errors->first('password') }}</p>
	<p>{{ $errors->first('first_name') }}</p>
	<p>{{ $errors->first('last_name') }}</p>
	
	@if (Session::has('login_errors'))
		<span class="error">{{ Lang::get('messages.login_error') }}</span>
	@endif
	
	<!-- email address -->
	<div class="control-group">
		<label for="email" class="control-label">
			{{ Lang::get('messages.email_address') }}
		</label>
		<div class="controls">
			{{ Form::email('email', Input::old('email')) }}
		</div>
	</div>
	
	<!-- password -->
	<div class="control-group">
		<label for="password" class="control-label">
			{{ Lang::get('messages.password') }}
		</label>
		<div class="controls">
			{{ Form::password('password') }}
		</div>
	</div>
	
	<!-- confirm password -->
	<div class="control-group">
		<label for="password_confirmation" class="control-label">
			Confirm password
		</label>
		<div class="controls">
			{{ Form::password('password_confirmation') }}
		</div>
	</div>
	
	<!-- first name -->
	<div class="control-group">
		<label for="first_name" class="control-label">
			{{ Lang::get('messages.firstName') }}
		</label>
		<div class="controls">
			{{ Form::text('first_name', Input::old('first_name')) }}
		</div>
	</div>
	
	<!-- last name -->
	<div class="control-group">
		<label for="last_name" class="control-label">
			{{ Lang::get('messages.lastName') }}
		</label>
		<div class="controls">
			{{ Form::text('last_name', Input::old('last_name')) }}
		</div>
	</div>
	
	<!-- register button -->
	<div class="control-group">
		<button type="submit" class="btn btn-large btn-primary">Register</button>
	</div>
	
{{ Form::close() }}

@stop