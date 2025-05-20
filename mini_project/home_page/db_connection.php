<?php
$host = "localhost";  // Change if using a different host
$user = "root";       // Default XAMPP username is "root"
$password = "";       // Default XAMPP password is empty
$database = "bidding"; // Make sure this matches your database name

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

