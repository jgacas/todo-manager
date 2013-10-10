<!-- app/views/header.blade.php -->

<div class="header">
	<h1>ToDo Manager</h1>
	<p>
		{{ Auth::user()->first_name }}, 
		{{ Auth::user()->last_name }}
		{{ HTML::link('logout', 'Logout') }}
	</p>
</div>