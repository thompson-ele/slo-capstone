<?php include('views/header.php');
    $currentYear = date('Y');
    $startYear = date('Y', strtotime('-10 year')); 
 ?>

<h1>TESTING</h1>
<form>
    <select class="form-control" name="season">
        <option value="Fall">Fall</option>
        <option value="Spring">Spring</option>
        <option value="Summer">Summer</option>
        <option value="Winter">Winter</option>
    </select>
    
    <select class="form-control" name="year">
    <?php for($startYear; $startYear <= $currentYear; $startYear++): ?>
        <option value="<?php echo $startYear; ?>"><?php echo $startYear; ?></option>
    <?php endfor; ?>
    </select>
</form>

<?php include('views/footer.php'); ?>