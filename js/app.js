angular.module("todoListApp", []);
var sloApp = angular.module("sloApp", ['ui.router']);

sloApp.config(function($stateProvider) {
    var courseState = {
        name: 'courses',
        url: '/courses',
        templateUrl: '../views/courses.html' 
    }

    $stateProvider.state(courseState);
  });