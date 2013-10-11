@extends('layouts.master')

@section('content')
{{ Form::open(array('action' => 'LoginController@processLogin')) }}

	<h2>Login</h2>
	<!-- validator errors -->
	<p>{{ $errors->first('email') }}</p>
	<p>{{ $errors->first('password') }}</p>
	
	@if (Session::has('login_errors'))
		<span class="error">{{ Lang::get('messages.login_error') }}</span>
	@endif

	<!-- username -->
	<div class="control-group">
		{{ Form::label('email', Lang::get('messages.email_address'), array('class' => 'control-label') ) }}
		{{ Form::email('email') }}
	</div>
	<!-- password -->
	<div class="control-group">	
		{{ Form::label('password', Lang::get('messages.password', array('class' => 'control-label'))) }}
		{{ Form::password('password') }}
	</div>
	<!-- submit -->
	<div class="control-group">
		<button type="submit" class="btn btn-large btn-primary">Login</button>
	</div>
	
	
{{ Form::close() }}
@stop