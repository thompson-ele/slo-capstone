'use strict';















// ToDoList Application from Treehouse
angular.module('todoListApp')
.controller('mainCtrl', function($scope, dataService) {
  
  $scope.helloConsole = dataService.helloConsole;

  $scope.addTodo = function() {
      var todo = {name: "This is a new todo."};
      $scope.todos.unshift(todo); // Adds to the list, unshift adds them to the top of the list
  }

  dataService.getTodos(function(response) {
    console.log(response.data);
    $scope.todos = response.data; // Assigning this inside a function prevents the function from running before receiving a response
  });

  $scope.deleteTodo = function(todo, $index) {
      dataService.deleteTodo(todo);
      $scope.todos.splice($index, 1); // Removes the one thing based on the index
  }

  $scope.saveTodos = function() {
      var filteredTodos = $scope.todos.filter(function(todo) { // filter method will filter edited todos into new array
        if(todo.edited) { return todo; }
      })
      dataService.saveTodos(filteredTodos);
  }
});