<?php include('views/header.html');
    include('models/term.php');
    $currentYear = date('Y');
    $startYear = date('Y', strtotime('-10 year')); 
    $terms = getTerms();
 ?>

<div class="container" ng-app="todoListApp">
    <h1>My TODOs</h1>
    <div ng-controller="mainCtrl" class="list">
        <input type="checkbox"/>
        <label class="editing-label">A sample todo!</label>
        <input class="editing-label" type="text" />
    
        <div class="actions">
            <a href="" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
            <a href="" class="btn btn-primary" ng-click="helloWorld()"><i class="fa fa-floppy-o"></i> Save</a>
            <a href="" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
        </div>
    </div>
</div>

<?php include('views/term.php'); ?>
<?php include('views/footer.html'); ?>