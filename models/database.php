<?php
// For help with DB connection see:
// https://devcenter.heroku.com/articles/cleardb#using-cleardb-with-php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $url = parse_url(getenv("mysql://bec7c0d6d3a1d5:e2335f56@us-cdbr-iron-east-03.cleardb.net/heroku_926f28b26fed366?reconnect=true"));

$host       = $url["host"];//'us-cdbr-iron-east-03.cleardb.net'; 
$username   = $url["user"];//'bec7c0d6d3a1d5';
$password   = $url["pass"];//'e2335f56'; 
$database   =  substr($url["path"], 1);//'heroku_926f28b26fed366';

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