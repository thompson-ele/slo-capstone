<?php include('views/header.html');
    include('models/term.php');
    $currentYear = date('Y');
    $startYear = date('Y', strtotime('-10 year')); 
    $terms = getTerms();
 ?>

<div class="container">

    <div ng-controller="mainCtrl" class="list">
        <h1 ng-click="helloWorld()">My TODOs</h1>
        <div>
            <input ng-model="todo.completed" type="checkbox"/>
            <label ng-hide="editing" class="editing-label" ng-click="helloWorld()">
            {{todo.name}}</label>
            <input ng-show="editing" ng-model="todo.name" class="editing-label" type="text"/>

            <div class="actions">
                <a href="" class="btn btn-primary" ng-click="editing = !editing"><i class="fa fa-pencil"></i> Edit</a>
                <a href="" class="btn btn-primary" ng-click="helloWorld()"><i class="fa fa-floppy-o"></i> Save</a>
                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </div>
        </div>
        {{todos}}
    </div>
</div><!--.container-->

<?php include('views/term.php'); ?>
<?php include('views/footer.html'); ?>