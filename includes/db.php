<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "scholarship_portal_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>