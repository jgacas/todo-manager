@extends('layouts.master')

@section('content')
{{ Form::open(array('action' => 'LoginController@processLogin')) }}

	<!-- validator errors -->
	<p>{{ $errors->first('email') }}</p>
	<p>{{ $errors->first('password') }}</p>
	
	@if (Session::has('login_errors'))
		<span class="error">{{ Lang::get('messages.login_error') }}</span>
	@endif

	<!-- username -->
	<p>
	{{ Form::label('email', Lang::get('messages.email_address') ) }}
	{{ Form::email('email') }}
	</p>
	
	<!-- password -->
	<p>
	{{ Form::label('password', Lang::get('messages.password')) }}
	{{ Form::password('password') }}
	</p>
	
	<!-- submit -->
	<p>{{ Form::submit(Lang::get('messages.login')) }}</p>
	
{{ Form::close() }}
@stop