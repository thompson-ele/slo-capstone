'use strict';

angular.module('sloApp')
    .service('courseService', function($http) {
        
        this.active = null;
        this.activeCourse = function(course) {
            $scope.active = course;
        }

        this.getCourse = function(course_id) {
            return $http({
                    method: 'post',
                    url: 'models/course.php',
                    data: $.param({'type' : 'getCourse',
                                   'course_id': course_id}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.getCourses = function(callback) {
            return $http({
                    method: 'post',
                    url: 'models/course.php',
                    data: $.param({'type' : 'getCourses'}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.saveCourse = function(course) {
            return $http({
                    method: 'post',
                    url: 'models/course.php',
                    data: $.param({'type' : 'saveCourse',
                                   'data': course}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.addCourse = function(course) {
            return $http({
                    method: 'post',
                    url: 'models/course.php',
                    data: $.param({'type' : 'addCourse',
                                   'data': course}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(data) {return data});
        };

        this.deleteCourses = function(courses) {};
    });