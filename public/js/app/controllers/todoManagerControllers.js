var todoManagerControllers = angular.module('todoManagerControllers', []);

todoManagerControllers.controller('TestCtrl', [
	'$scope',
	function TestCtrl($scope) {
		$scope.text = 'Text assigned by Controller';
	}]);
todoManagerControllers.controller('HomeCtrl', [
	'$scope',
	function HomeCtrl($scope) {
		$scope.h1text = 'Manage ToDo list';
		$scope.ptext = 'Future versions...';
	}]);
