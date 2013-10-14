@extends('layouts.master')

<!-- app/views/login.blade.php -->

@section('content')
{{ Form::open(array('action' => 'LoginController@processLogin')) }}

	<h2>Login</h2>
	
	<div class="control-group error">
	@if (Session::has('login_errors'))
		<span class="help-inline">{{ Lang::get('messages.login_error') }}</span>
	@endif
	</div>

	<!-- username -->
	<div class="control-group error">
		{{ Form::label('email', Lang::get('messages.email_address'), array('class' => 'control-label') ) }}
		<div class="controls">
			{{ Form::email('email') }}
			<span class="help-inline">
				{{ $errors->first('email') }}
			</span>
		</div>
	</div>
	<!-- password -->
	<div class="control-group error">	
		{{ Form::label('password', Lang::get('messages.password', array('class' => 'control-label'))) }}
		<div class="controls">	
			{{ Form::password('password') }}
			<span class="help-inline">
				{{ $errors->first('password') }}
			</span>
		</div>
	</div>
	<!-- submit -->
	<div class="control-group">
		<button type="submit" class="btn btn-large btn-primary">Login</button>
	</div>
	
{{ Form::close() }}
@stop