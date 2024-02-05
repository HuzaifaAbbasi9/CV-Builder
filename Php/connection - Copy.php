<?php
$servername = "localhost:3306";
$username = "dollames_buildcv";
$password = "khl2lkV-6R(B";
$dbname = "dollames_cv-buailder";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}



?>
