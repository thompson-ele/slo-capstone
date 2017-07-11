angular.module('sloApp')
  .controller('outcomeCtrl', function($scope, outcomeService, courseService) {
    

    $scope.addOutcome = function(newOutcome) {
        outcomeService.addOutcome(newOutcome).then(function(response) {
          $scope.success = true;
          $scope.msg = 'Successfully added the outcome!';
          $scope.outcomes.unshift(newOutcome);
        }, function(response) {
          $scope.success = false;
        });
    }

    $scope.getOutcomes = function(course) {
      outcomeService.getOutcomes(course.course_id).then(function(data) {
            $scope.outcomes = data.data.records;
      });
    }

    // if($scope.active !== null) {
    //   outcomeService.getOutcomes(active.course_id).then(function(data) {
    //         $scope.outcomes = data.data.records;
    //   });
    // }

    $scope.saveOutcome = function(outcome) {
      outcomeService.saveOutcome(outcome).then(function(response) {
        $scope.success = true;
        $scope.msg = 'Saved your changes!'
      }, function(response) {
        $scope.success = false;
      });
    }

  });