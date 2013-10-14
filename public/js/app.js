

var todoManager = angular.module('todoManager', []);

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