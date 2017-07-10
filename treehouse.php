<!doctype html>
<html>
<head>
    <title>Student Learning Outcomes</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/fae7a79c55.css" media="all">
    <!-- CUSTOM STYLESHEETS -->
    <link rel="stylesheet" href="css/app.css" type="text/css">
</head>

<body ng-app="todoListApp">

<div class="container">
    <h1>My TODOs</h1>
    <div ng-app="todoListApp">
        <todos></todos>
    </div>
</div><!--.container-->

<?php include('views/footer.html'); ?>