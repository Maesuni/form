<?php
include('db_config.php');  // Include the database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Student deleted successfully.";
        echo "<br><a href='students.php'>Back to Student List</a>";
    } else {
        echo "Error deleting student: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No student ID provided.";
}

$conn->close();
?>
