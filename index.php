<?php include('views/header.html');
    include('models/term.php');
    $currentYear = date('Y');
    $startYear = date('Y', strtotime('-10 year')); 
    $terms = getTerms();
 ?>

<div class="container">

    <div ng-controller="mainCtrl" class="list">
        <h1 ng-click="helloWorld()">My TODOs</h1>

        <!-- ng-class adds the .editing-item or .edited classes if the editing or todo.edited variables are TRUE -->
        <div class="item" ng-class="{'editing-item': editing, 'edited': todo.edited}" ng-repeat="todo in todos">
            <input ng-model="todo.completed" type="checkbox"/>
            <label ng-hide="editing" ng-click="helloWorld()">
            {{todo.name}}</label>
            <!-- ng-change sets todo.edited to TRUE if something has changed in this input -->
            <input ng-change="todo.edited = true" ng-blur="editing = false;" ng-show="editing" ng-model="todo.name" class="editing-label" type="text"/>

            <div class="actions">
                <a href="" ng-click="editing = !editing" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                <a href="" ng-click="saveTodo(todo)" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</a>
                <a href="" ng-click="deleteTodo(todo, $index)" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </div>
        </div>
        {{todos}}
    </div><!--mainCtrl-->
</div><!--.container-->

<?php include('views/term.php'); ?>
<?php include('views/footer.html'); ?>