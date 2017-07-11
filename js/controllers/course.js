angular.module('sloApp')
  .controller('courseCtrl', function($scope, courseService, outcomeService) {
    // Stores active course in active variable
    $scope.active = null;
    $scope.activeCourse = function(course) {
        $scope.active = course;
    }

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

    $scope.addOutcome = function(newOutcome) {
      outcomeService.addOutcome(newOutcome).then(function(response) {
        $scope.outcomes.push(newOutcome);
      }, function(response) {
        console.log('There was a problem adding the outcome');
      });
    }

    $scope.getOutcomes = function(course) {
      outcomeService.getOutcomes(course.course_id).then(function(response) {
        $scope.outcomes = response.data.records;
      });
    }

    $scope.saveCourse = function(course) {
      courseService.saveCourse(course).then(function(response) {
        $scope.success = true;
        $scope.msg = 'Saved your changes!'
      }, function(response) {
        $scope.success = false;
      });
    }

  });