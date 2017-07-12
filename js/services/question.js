'use strict';

angular.module('sloApp')
    .service('questionService', function($http) {
        this.getQuestion = function(question_id) {
            return $http({
                    method: 'post',
                    url: 'models/question.php',
                    data: $.param({'type' : 'getQuestion',
                                   'question_id': question_id}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.getQuestions = function(outcome_id) {
            return $http({
                    method: 'post',
                    url: 'models/question.php',
                    data: $.param({'type' : 'getQuestions',
                                   'outcome_id' : outcome_id}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.saveQuestion = function(question) {
            return $http({
                    method: 'post',
                    url: 'models/question.php',
                    data: $.param({'type' : 'saveQuestion',
                                   'data': question}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.addQuestion = function(question) {
            return $http({
                    method: 'post',
                    url: 'models/question.php',
                    data: $.param({'type' : 'addQuestion',
                                   'data': question}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.deleteQuestion = function(question) {
            return $http({
                    method: 'post',
                    url: 'models/question.php',
                    data: $.param({'type' : 'deleteQuestion',
                                   'data' : question}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(data) {return data});
        };
    });