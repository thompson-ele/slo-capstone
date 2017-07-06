<div class="container">
    <h1>Terms</h1>
    <form>
        <div class="form-group">
            <select class="form-control" name="season">
                <option value="Fall">Fall</option>
                <option value="Spring">Spring</option>
                <option value="Summer">Summer</option>
                <option value="Winter">Winter</option>
            </select>
        </div>
        
        <div class="form-group">
            <select class="form-control" name="year">
            <?php for($currentYear; $currentYear >= $startYear; $currentYear--): ?>
                <option value="<?php echo $currentYear; ?>"><?php echo $currentYear; ?></option>
            <?php endfor; ?>
            </select>
        </div>
    </form>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Term ID</th>
                <th>Season</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($terms as $term): ?>
            <tr>
                <td><?php echo $term['term_id']; ?></td>
                <td><?php echo $term['term_season']; ?></td>
                <td><?php echo $term['term_year']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>