<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "expense_db";

// Create the connection
$conn = new mysqli($host, $user, $password, $database);

// Stop everything if the connection failed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>