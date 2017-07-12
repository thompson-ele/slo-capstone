'use strict';

angular.module('todoListApp')
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
    
    this.saveTodos = function(todos) {
        console.log(todos.length + " todos have been saved!");
        // other logic
    }

});