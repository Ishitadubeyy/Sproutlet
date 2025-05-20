<?php
$host = "localhost";  // Change if your database is on a different server
$username = "root";   // Your MySQL username
$password = "";       // Your MySQL password (default is empty for XAMPP)
$database = "bidding"; // Change to your actual database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
echo "Database Connection Successful!";
?>
