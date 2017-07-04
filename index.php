<!doctype html>
<html>
<head>
    <title>Student Learning Outcomes</title>
</head>

<body>
    <h1>TESTING</h1>
    <?php
        include('models/database.php');
        $results = $db->query("SELECT * FROM student");

        foreach($results as $student) {
            echo '<p>'.$student['student_id'].'</p>';
        }
    ?>
</body>
</html>