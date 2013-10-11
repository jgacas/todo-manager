<!-- app/views/header.blade.php -->
 
<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<ul class="nav">
				<li class="active"><a href="#">ToDo Manager</a></li>
				@if (Route::currentRouteName() == 'login')
					@include('loginheader')
				@elseif (Route::currentRouteName() == 'register')
					<!-- nothing to display on register -->
				@else
					@include('homeheader')
		        @endif
			</ul>
		</div>
	</div>
</div>