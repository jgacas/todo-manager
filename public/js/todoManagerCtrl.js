todoManager.controller('TodoCtrl', function TodoCtrl($scope, $location) {

	var todos = $scope.todos = [];

	$scope.newTodo = '';
	$scope.editedTodo = null;

	if ($location.path() === '') {
		$location.path('/');
	}

	$scope.addTodo = function() {
		
		var newTodo = $scope.newTodo.trim();
		if (!newTodo.length) {
			return;
		}

		todos.push({
			title: newTodo,
			completed: false
		});

		$scope.newTodo = '';
	}

	$scope.editTodo = function(todo) {
		// impement
	}

	$scope.removeTodo = function(todo) {
		todos.splice(todos.indexOf(todo), 1);
	}

	$scope.doneEditing = function(todo) {
		// implement
	}
});