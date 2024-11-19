<?php
$servername = "localhost";  // Your database server (e.g., localhost)
$username = "root";         // Your database username (e.g., root)
$password = "";             // Your database password (e.g., '' or 'root')
$dbname = "student_db";     // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
