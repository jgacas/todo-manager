<!DOCTYPE html>
<html lang="en">

<!-- app/views/layouts/master.blade.php -->

<head>
	<meta charset="utf-8">
	@yield('meta_info')
	
	<title>{{ Lang::get('messages.project_name') }}</title>
	
	<!-- load default CSS file -->
	<!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
	<!-- {{ HTML::style('css/bootstrap.min.css') }} -->
	<!-- {{ HTML::style('css/bootstrap.css') }} -->
	<!-- {{ HTML::style('css/bootstrap-responsive.css') }} -->
	<!-- {{ HTML::style('css/style.css') }}  -->
</head>
<body>
	<div class="container">
		@include('header')
		<div class="hero-unit">
			@yield('content')
		</div>
		@include('footer')
	</div>
	<!-- load script files -->
	{{ HTML::script('js/jquery-1.10.2.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	<!-- {{ HTML::script('js/script.js') }}  -->
	@yield('scripts')
</body>
</html>