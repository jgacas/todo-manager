todoManager.controller('TodoCtrl', function TodoCtrl($scope, $location, TodoRestClient) {

	var todos = $scope.todos = TodoRestClient.query();

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
			id: '',
			title: newTodo,
			completed: false,
			importance: todos.length
		});

		$scope.newTodo = '';
	}

	$scope.removeTodo = function(todo) {
		alert('remove' + todo.id)
		TodoRestClient.remove(todo);
		todos.splice(todos.indexOf(todo), 1);
	}

	$scope.doneEditing = function(todo) {
		alert('todo');
		var position = todos.indexOf(todo);
		todos[position] = todo;
		alert(todos[position].title + todos[position].completed);
	}

	$scope.moveUp = function(todo) {
		alert('moveUp()');
		var position = todos.indexOf(todo);
		alert(position);
		if (position>0) {
			todos.move(position, position - 1);
		}
		alert(todos.indexOf(todo));
	}

	$scope.moveDown = function(todo) {
		alert('moveDown()');
		var position = todos.indexOf(todo);
		alert(position);
		if (position < todos.length - 1) {
			todos.move(position, position + 1);
		}
		alert(todos.indexOf(todo));
	}

	Array.prototype.move = function (from, to) {
  		this.splice(to, 0, this.splice(from, 1)[0]);
	}
});