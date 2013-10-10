<!-- app/views/layouts/master.blade.php -->

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('meta_info')
	
	<title>{{ Lang::get('messages.project_name') }}</title>
	
	<!-- load default CSS file -->
	{{ HTML::style('style.css') }}
	@yield('scripts')
</head>
<body>
	<div id='container'>
		<div id='header'>
			@include('header')
		</div>
		
		<div id='content'>
			@yield('content')
		</div>
		
		<div id='footer'>
			@include('footer')
		</div>
	</div>
</body>
</html>