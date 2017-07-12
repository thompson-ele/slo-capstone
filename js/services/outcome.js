'use strict';

angular.module('sloApp')
    .service('outcomeService', function($http) {

        this.getOutcome = function(outcome_id) {
            return $http({
                    method: 'post',
                    url: 'models/outcome.php',
                    data: $.param({'type' : 'getOutcome',
                                   'outcome_id': outcome_id}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.getOutcomes = function(course_id) {
            return $http({
                    method: 'post',
                    url: 'models/outcome.php',
                    data: $.param({'type' : 'getOutcomes',
                                   'course_id' : course_id}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.saveOutcome = function(outcome) {
            return $http({
                    method: 'post',
                    url: 'models/outcome.php',
                    data: $.param({'type' : 'saveOutcome',
                                   'data': outcome}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.addOutcome = function(outcome) {
            return $http({
                    method: 'post',
                    url: 'models/outcome.php',
                    data: $.param({'type' : 'addOutcome',
                                   'data': outcome}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.deleteOutcomes = function(outcomes) {};
    });