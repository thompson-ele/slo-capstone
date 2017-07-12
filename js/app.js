angular.module("todoListApp", []);
var sloApp = angular.module("sloApp", ['ui.router']);

sloApp.config(function($stateProvider, $urlRouterProvider) {

    $stateProvider
        
        .state('home', {
            url: '',
            templateUrl: '../views/main.html'
        })

        .state('courses', {
            url: '/courses',
            templateUrl: '../views/courses.html'
        })
        
        .state('sections', {
            url: '/sections',
            templateUrl: '../views/section.html'
        });


    
  });