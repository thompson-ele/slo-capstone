var todoListApp = angular.module("todoListApp", []);

todoListApp.controller('mainCtrl', function($scope, dataService) {
  
  $scope.helloConsole = dataService.helloConsole;

  $scope.learningNgChange = function() {
    console.log("An input changed!");
  };

  dataService.getTodos(function(response) {
    console.log(response.data);
    $scope.todos = response.data; // Assigning this inside a function prevents the function from running before receiving a response
  });

  $scope.deleteTodo = function(todo, $index) {
      dataService.deleteTodo(todo);
      $scope.todos.splice($index, 1); // Removes the one thing based on the index
  }

  $scope.saveTodo = function(todo) {
      dataService.saveTodo(todo);
  }
})

.service('dataService', function($http) { // Need to include $http provider to handle HTTP requests

    this.helloConsole = function() {
        console.log("This is a service woo!");
    }

    this.getTodos = function(callback) {
        $http.get('mock/todos.json')
             .then(callback);
    }

    this.deleteTodo = function(todo) { // Accepts parameter of todo being deleted
        console.log("The " + todo.name + " todo has been deleted!");
        // other logic
    }
    
    this.saveTodo = function(todo) {
        console.log("The " + todo.name + " todo has been saved!");
        // other logic
    }

});