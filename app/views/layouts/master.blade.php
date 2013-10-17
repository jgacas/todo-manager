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
	{{ HTML::script('js/vendor/jquery-1.10.2.min.js') }}
	{{ HTML::script('js/vendor/bootstrap.min.js') }}
	{{ HTML::script('js/vendor/angular.min.js') }}
	{{ HTML::script('js/vendor/angular-resource.min.js') }}
	{{ HTML::script('js/app/app.js') }}
	{{ HTML::script('js/app/controllers/todoManagerCtrls.js') }}
	{{ HTML::script('js/app/services/services.js') }}
	@yield('scripts')
</body>
</html>