// Name your file the same thing that you name your directive
angular.module('todoListApp')
.directive('todos', function() {
    return { // return directive as an object
        templateUrl: 'views/todos.html',
        controller: 'mainCtrl'
        //, replace: true ** Replaces directive tags with just divs
    }
});