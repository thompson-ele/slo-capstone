angular.module("todoListApp", [])
    .controller('mainCtrl', function($scope) {
        $scope.helloWorld = function() {
            console.log("Hello there! This is th helloWorld contoller function, in the mainCtrl");
        }
    });