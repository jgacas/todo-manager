todoManager.controller('TodoListCtrl', function TodoListCtrl($scope, $location, todosFactory) {

    var todos = $scope.todos = todosFactory.query();
    $scope.orderProp = 'importance';
    $scope.newTodo = '';
    $scope.editedTodo = null;

    if ($location.path() === '') {
        $location.path('/');
    }

    $scope.addTodo = function () {
        var newTodo = $scope.newTodo.trim();
        if (!newTodo.length) {
            return;
        }

        var todo = {
            title: newTodo,
            completed: false,
            importance: todos.length
        };
        todosFactory.save(todo, function (response) {
            todo.id = response.id;
        });
        todos.push(todo);
        $scope.newTodo = '';
    }

    $scope.removeTodo = function (todo) {
        todos.splice(todos.indexOf(todo), 1);
        todosFactory.remove(todo);
        for (var i = 0, len = todos.length; i < len; i++) {
            if (todos[i].importance > todo.importance) {
                todos[i].importance--;
                todosFactory.update(todos[i]);
            }
        };
    }

    $scope.doneEditing = function(todo) {
        if (todo.title.length) {
            todosFactory.update(todo);
        } else {
            alert("Todo cannot be empty!");
        }
    }

    $scope.moveUp = function(todo) {
        var previous = _lookup(todos)[todo.importance - 1];
        if (previous) {
            // update list
            todo.importance--;
            previous.importance++;
            // update database
            todosFactory.update(todo);
            todosFactory.update(previous);
        }
    }

    $scope.moveDown = function(todo) {
        var next = _lookup(todos)[todo.importance + 1];
        if (next) {
            // update list
            todo.importance++;
            next.importance--;
            // update database
            todosFactory.update(todo);
            todosFactory.update(next);
        }
    }

    var _lookup = function _lookup(todos) {
        var lookup = {};
        for (var i = 0, len = todos.length; i < len; i++) {
            lookup[todos[i].importance] = todos[i];
        }
        return lookup;
    }
});