<?php

function getStudents() {
    include('database.php');
    return $db->query("SELECT * FROM student");
}

function getTerms() {
    include('database.php');
    return $db->query("SELECT * FROM term");
}

?>