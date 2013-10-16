todoManager.controller('TodoCtrl', function TodoCtrl($scope, $location, TodoRestClient) {

	var todos = $scope.todos = TodoRestClient.query();
	$scope.orderProp = 'importance';
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

		var todo = {
			title: newTodo,
			completed: false,
			importance: todos.length
		};
		TodoRestClient.save(todo, function(response) {
			todo.id = response.id;
		});
		todos.push(todo);
		$scope.newTodo = '';
	}

	$scope.removeTodo = function(todo) {
		todos.splice(todos.indexOf(todo), 1);
		TodoRestClient.remove(todo);
		for (var i = 0, len = todos.length; i < len; i++) {
			if (todos[i].importance > todo.importance) {
				todos[i].importance--;
				TodoRestClient.update(todos[i]);
			}
		};
	}

	$scope.doneEditing = function(todo) {
		if (todo.title.length) {
			TodoRestClient.update(todo);
		} else {
			alert("Todo cannot be empty!");
		}
	}

	$scope.moveUp = function(todo) {
		var lookup = {};
		for (var i = 0, len = todos.length; i < len; i++) {
    		lookup[todos[i].importance] = todos[i];
		}
		var previous = lookup[todo.importance - 1];
		if (previous) {
			todo.importance--;
			TodoRestClient.update(todo);
			previous.importance++;
			TodoRestClient.update(previous);
		}
	}

	$scope.moveDown = function(todo) {
		var lookup = {};
		for (var i = 0, len = todos.length; i < len; i++) {
    		lookup[todos[i].importance] = todos[i];
		}
		var next = lookup[todo.importance + 1];
		if (next) {
			todo.importance++;
			TodoRestClient.update(todo);
			next.importance--;
			TodoRestClient.update(next);
		}
	}
});