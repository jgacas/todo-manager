

var todoManager = angular.module('todoManager', ['todoServices']);

todoManager.config(['$routeProvider',
	function($routeProvider) {
		$routeProvider.when('/', {
			templateUrl: 'partials/home.html',
			controller: 'TodoCtrl'
		}).
		otherwise({
			redirectTo: '/'
		});
	}]);