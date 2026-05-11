<?php
// Database Connection File
// Database Details: localhost, root (no password), school_db

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("<h2>Database Connection Error!</h2>" . 
        "<p>Make sure MySQL is running in XAMPP and database 'school_db' exists.</p>" .
        "<p>Error: " . $conn->connect_error . "</p>");
}

// Set charset to UTF-8
$conn->set_charset("utf8mb4");
?>