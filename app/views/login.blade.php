<!-- app/view/login.blade.php -->

{{ Form::open(array('action' => 'LoginController@login')) }}
	{{ Form::label('email', 'Email Address') }}
	{{ Form::email('email') }}
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password') }}
	{{ Form::submit('Login') }}
{{ Form::close() }}