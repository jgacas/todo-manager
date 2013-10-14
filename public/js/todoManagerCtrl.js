todoManager.controller('TodoCtrl', function TodoCtrl($scope, $location) {

	var todos = $scope.todos = null;

	$scope.newTodo = '';
	$scope.editedTodo = null;

	if ($location.path() === '') {
		$location.path('/');
	}

	$scope.addTodo = function() {
		// implement
	}

	$scope.editTodo = function(todo) {
		// impement
	}

	$scope.removeTodo = function(todo) {
		// implement
	}

	$scope.doneEditing = function(todo) {
		// implement
	}
});