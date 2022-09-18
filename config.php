<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cashier_system";

// Create connection to mysqli server
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>
