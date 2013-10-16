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
		// remove todo
		todos.splice(todos.indexOf(todo), 1);
		TodoRestClient.remove(todo);
		// update importance of lower priority todos
		for (i=0; i<todos.length; i++) {
			if (todos[i].importance > todo.importance) {
				todos[i].importance--;
				TodoRestClient.update(todos[i]);
			}
		};
	}

	$scope.doneEditing = function(todo) {
		var position = todos.indexOf(todo);
		todos[position] = todo;
		TodoRestClient.update(todo);
	}

	$scope.moveUp = function(todo) {
		if (todo.importance > 0) {
			var index = todos.indexOf(todo);
			todos[index].importance--;
			TodoRestClient.update(todos[index]);
			todos[index-1].importance++;
			TodoRestClient.update(todos[index-1]);
		}
		alert(todos.indexOf(todo));
	}

	$scope.moveDown = function(todo) {
		if (todo.importance < todos.length-1) {
			var index = todos.indexOf(todo);
			var swapIndex = index+1;
			todos[index].importance++;
			TodoRestClient.update(todos[index]);
			todos[swapIndex].importance--;
			TodoRestClient.update(todos[swapIndex]);	
		}
	}

	Array.prototype.move = function (from, to) {
  		this.splice(to, 0, this.splice(from, 1)[0]);
	}
});