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

    <header>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" aria-expanded="false" data-target="#navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Student Learning Outcomes</a>
                </div><!--.navbar-header-->

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a ui-sref="courses">Courses</a></li>
                        <li><a ui-sref="sections">Sections</a></li>
                        <!--<li><a href="">Surveys</a></li>-->
                    </ul>
                </div>
            </div><!--.container-->
        </nav>
    </header>

    <div class="container">

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
    <script src="js/services/question.js"></script>
</body>
</html>