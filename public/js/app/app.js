

var todoManager = angular.module('todoManager', ['todoServices']);

todoManager.config(['$routeProvider',
	function($routeProvider) {
		$routeProvider.when('/', {
			templateUrl: 'js/app/views/home.html',
			controller: 'TodoListCtrl'
		}).
		otherwise({
			redirectTo: '/'
		});
	}]);