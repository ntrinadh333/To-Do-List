<?php
// Database connection details
$host = "localhost:3306";
$username = "root";
$password = "root";
$database = "taskmanager";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>