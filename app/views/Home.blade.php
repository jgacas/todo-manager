@extends('layouts.Master')

@section('header')
	@include('layouts.AuthUserHeader')
@stop

@section('content')
	<div ng-view>
		<!-- use views defined with angularjs -->
	</div>
@stop