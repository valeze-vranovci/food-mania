<?php
ob_start();
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db="labdb";

// Create connection
$conn=mysqli_connect("localhost","root","","labdb");


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
