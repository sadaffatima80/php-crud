<?php

$servername = "localhost";
$username = "id21201068_root";
$password = "Ansaansa@80";
$database = "id21201068_stdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>