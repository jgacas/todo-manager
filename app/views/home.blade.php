<!-- app/views/home.blade.php -->

<div class="header">
	Welcome back, {{ Auth::user()->first_name }}
	{{ HTML::link('logout', 'Logout') }}
</div>


<div class="content">
	<h1>ToDO Manager</h1>
	<p>Future version of ToDo Manager will have task list here</p>
</div>