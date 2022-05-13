<?php
// 1. Create a database connection
$connection = mysqli_connect("localhost","root","");
if (!$connection) {
    error_log("Failed to connect to MySQL: " . mysqli_connect_error($connection));
    die('Unable to establish connection.');
}

// 2. Select a database to use 
$db = mysqli_select_db($connection, "spes_db");
if (!$db) {
    error_log("Database selection failed: " . mysqli_connect_error($connection));
    die('Unable to establish connection.');
}
?>