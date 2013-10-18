@extends('layouts.Master')

<!-- app/views/register.blade.php -->

@section('header')
	@include('layouts.GuestHeader')
@stop

@section('content')
	{{ Form::open(array('action' => 'RegisterController@processRegistration')) }}

		<h2>Register</h2>
		
		@if (Session::has('login_errors'))
			<span class="error">{{ Lang::get('messages.login_error') }}</span>
		@endif
		
		<!-- email address -->
		<div class="control-group error">
			<label for="email" class="control-label">
				{{ Lang::get('messages.email_address') }}
			</label>
			<div class="controls">
				{{ Form::email('email', Input::old('email')) }}
				<span class="help-inline">{{ $errors->first('email') }}</span>
			</div>
		</div>
		
		<!-- password -->
		<div class="control-group error">
			<label for="password" class="control-label">
				{{ Lang::get('messages.password') }}
			</label>
			<div class="controls">
				{{ Form::password('password') }}
				<span class="help-inline">{{ $errors->first('password') }}</span>
			</div>
		</div>
		
		<!-- confirm password -->
		<div class="control-group error">
			<label for="password_confirmation" class="control-label">
				Confirm password
			</label>
			<div class="controls">
				{{ Form::password('password_confirmation') }}
			</div>
		</div>
		
		<!-- first name -->
		<div class="control-group error">
			<label for="first_name" class="control-label">
				{{ Lang::get('messages.firstName') }}
			</label>
			<div class="controls">
				{{ Form::text('first_name', Input::old('first_name')) }}
				<span class="help-inline">{{ $errors->first('first_name') }}</span>
			</div>
		</div>
		
		<!-- last name -->
		<div class="control-group error">
			<label for="last_name" class="control-label">
				{{ Lang::get('messages.lastName') }}
			</label>
			<div class="controls">
				{{ Form::text('last_name', Input::old('last_name')) }}
				<span class="help-inline">{{ $errors->first('last_name') }} </span>
			</div>
		</div>
		
		<!-- register button -->
		<div class="control-group">
			<button type="submit" class="btn btn-large btn-primary">Register</button>
		</div>
		
	{{ Form::close() }}
@stop