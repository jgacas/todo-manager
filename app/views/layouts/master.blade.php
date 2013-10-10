<!-- app/views/layouts/master.blade.php -->

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('meta_info')
	<title>{{ Lang::get('messages.project_name') }}</title>
	@yield('scripts')
</head>
<body>
	<div id='header'>
		@include('header')
	</div>
	
	<div id='content'>
		@yield('content')
	</div>
	
	<div id='footer'>
		@include('footer')
	</div>
</body>
</html>