<!-- app/views/header.blade.php -->

<h1 id="headertitle"> {{ Lang::get('messages.project_name') }}</h1>
<p>
	@if (Auth::check())
		{{ Auth::user()->first_name }}
		{{ Auth::user()->last_name }}
		{{ HTML::link('logout', 'Logout') }}
	@endif
</p>
