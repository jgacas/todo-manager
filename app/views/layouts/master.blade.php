<!DOCTYPE html>
<html lang="en" ng-app="todoManager">

<!-- app/views/layouts/master.blade.php -->

<head>
	<meta charset="utf-8">
	@yield('meta_info')
	
	<title>{{ Lang::get('messages.project_name') }}</title>
	
	<!-- load default CSS file -->
	<!-- Bootstrap css -->
	{{ HTML::style('css/bootstrap.min.css') }}

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
	<!-- {{ HTML::script('js/script.js') }} -->
	{{ HTML::script('js/angular.min.js') }}
	{{ HTML::script('js/app.js') }}
	{{ HTML::script('js/todoManagerCtrl.js') }}
	@yield('scripts')
</body>
</html>