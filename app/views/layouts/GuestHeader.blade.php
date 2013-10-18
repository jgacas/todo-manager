@extends('layouts.Header')

<!-- app/views/layouts/GuestHeader.blade.php -->

@section('header-content')
	<li>{{ HTML::link('login', 'Login') }}</li>
	<li>{{ HTML::link('register', 'Register') }}</li>
@stop