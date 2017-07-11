<!doctype html>
<html ng-app="sloApp">
<head>
    <title>Student Learning Outcomes</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/fae7a79c55.css" media="all">
    <!-- CUSTOM STYLESHEETS -->
    <link rel="stylesheet" href="css/app.css" type="text/css">
</head>

<body ng-controller="courseCtrl">

    <div class="container">
    
        <!--<div class="row">
            <div class="col-sm-2">
                <ul>
                    <li><a ui-sref="courses">Courses</a></li>
                    <li><a href="">Instructors</a></li>
                    <li><a href="">Sections</a></li>
                    <li><a href="">Surveys</a></li>
                </ul>
            </div>
            <div class="col-sm-10">
                
            </div>
        </div>-->

        <ui-view></ui-view>

    </div>


    <!-- jQuery -->
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="js/angular.min.js"></script>
    <script src="//unpkg.com/angular-ui-router/release/angular-ui-router.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/controllers/main.js"></script>
    <script src="js/controllers/course.js"></script>
    <script src="js/controllers/outcome.js"></script>
    <script src="js/services/course.js"></script>
    <script src="js/services/outcome.js"></script>

    <!-- TREEHOUSE FILES-->
    <script src="js/services/data.js"></script>
    <script src="js/directives/todos.js"></script>
</body>
</html>