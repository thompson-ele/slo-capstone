angular.module('sloApp')
  .controller('courseCtrl', function($scope, courseService) {
    $scope.addCourse = function(newCourse) {
        courseService.addCourse(newCourse).then(function(response) {
          $scope.success = true;
          $scope.msg = 'Successfully added the course!';
          $scope.courses.unshift(newCourse);
        }, function(response) {
          $scope.success = false;
        });
    }

    courseService.getCourses().then(function(data) {
      $scope.courses = data.data.records;
    });

    $scope.saveCourse = function(course) {
      courseService.saveCourse(course).then(function(response) {
        $scope.success = true;
        $scope.msg = 'Saved your changes!'
      }, function(response) {
        $scope.success = false;
      });
    }
  });