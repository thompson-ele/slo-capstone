<?php
// For help with DB connection see:
// https://devcenter.heroku.com/articles/cleardb#using-cleardb-with-php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$host       = $url["host"];
$username   = $url["user"];
$password   = $url["pass"];
$database   = substr($url["path"], 1);

// Create PDO object
try {
    $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Sets PDO Error Mode, all errors are converted to Exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>