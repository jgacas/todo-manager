<!-- app/view/login.blade.php -->

{{ Form::open(array('action' => 'LoginController@processLogin')) }}

	@if (Session::has('login_errors'))
		<span class="error">Email or password incorrect</span>
	@endif

	<!-- username -->
	<p>
	{{ Form::label('email', 'Email Address') }}
	{{ Form::email('email') }}
	</p>
	
	<!-- password -->
	<p>
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password') }}
	</p>
	
	<!-- submit -->
	<p>{{ Form::submit('Login') }}</p>
	
{{ Form::close() }}