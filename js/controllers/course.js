angular.module('sloApp')
  .controller('courseCtrl', function($scope, $filter, courseService, outcomeService, questionService) {
    // Stores active course in active variable
    $scope.active = null;
    $scope.activeCourse = function(course) {
        $scope.active = course;
    }

    $scope.addCourse = function(newCourse) {
        courseService.addCourse(newCourse).then(function(response) {
          $scope.success = true;
          $scope.msg = 'Successfully added the course!';
          newCourse.course_id = response.data.records.course_id;
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


    // OUTCOMES
    $scope.addOutcome = function(newOutcome) {
      outcomeService.addOutcome(newOutcome).then(function(response) {
        newOutcome.outcome_id = response.data.records.outcome_id;
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

    $scope.saveOutcome = function(outcome) {
      outcomeService.saveOutcome(outcome).then(function(response) {
        $scope.success = true;
        $scope.msg = 'Saved the changes to the outcome!'
      }, function(response) {
        $scope.success = false;
      });
    }

    // QUESTIONS
    $scope.getQuestions = function(outcome) {
      questionService.getQuestions(outcome.outcome_id).then(function(response) {
        outcome.questions = response.data.records;
      })
    }

    $scope.addQuestion = function(newQuestion) {
      questionService.addQuestion(newQuestion).then(function(response) {
        console.log(response);
        // Gets the outcome with same outcome_id
        var matchingOutcome = $filter("filter")($scope.outcomes, {outcome_id: newQuestion.outcome_id})[0];
        console.log(matchingOutcome);
        matchingOutcome.questions.push(newQuestion);
      }, function(response) {
        console.log('There was a problem adding the question');
      });
    }

    $scope.saveQuestion = function(question) {
      questionService.saveQuestion(question).then(function(response) {
        $scope.success = true;
        $scope.msg = 'Saved the changes to the question!'
      }, function(response) {
        $scope.success = false;
      });
    }
  });