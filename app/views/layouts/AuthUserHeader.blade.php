@extends('layouts.Header')

<!-- app/views/layouts/AuthUserHeader.blade.php -->

@section('header-content')

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

@stop