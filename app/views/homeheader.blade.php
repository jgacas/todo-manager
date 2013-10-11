<!-- app/views/homeheader.blade.php -->

@if (Auth::check())
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		{{ Auth::user()->first_name }}
		{{ Auth::user()->last_name }} 
		<b class="caret"></b>
	</a>
	<ul class="dropdown-menu">
		<li>{{ HTML::link('logout', 'Logout') }}</li>
	</ul>
</li>
@endif