<?php

function getStudents() {
    include('models/database.php');
    return $db->query("SELECT * FROM student");
}

function getTerms() {
    include('models/database.php');
    return $db->query("SELECT * FROM term");
}

?>