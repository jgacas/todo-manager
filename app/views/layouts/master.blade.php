
<!-- app/views/layouts/master.blade.php -->

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	@yield('meta_info')
	
	<title>{{ Lang::get('messages.project_name') }}</title>
	
	<!-- load default CSS file -->
	{{ HTML::style('css/style.css') }}
	{{ HTML::style('css/bootsrap.css') }}
	{{ HTML::style('css/bootstrap-responsive.css') }}
</head>
<body>
	<div id='container'>
		<div id='header'>
			@include('oldheader')
		</div>
		
		<div id='content'>
			@yield('content')
		</div>
		
		<div id='footer'>
			@include('footer')
		</div>
	</div>
	
	<!-- load script files -->
	{{ HTML::script('js/jquery-1.10.2.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/script.js') }}
	@yield('scripts')
</body>
</html>