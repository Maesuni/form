<?php
// Include the database connection file
include('db_config.php');

// Query to get all students from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

echo "<h2>Student List</h2>";

// If there are students in the database, display them in a table
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Course</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>";
    
    // Fetch and display each student
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['firstname'] . "</td>
                <td>" . $row['middlename'] . "</td>
                <td>" . $row['lastname'] . "</td>
                <td>" . $row['age'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['course'] . "</td>
                <td>" . $row['section'] . "</td>
                <td>
                    <a href='update_student.php?id=" . $row['id'] . "'>Update</a> | 
                    <a href='delete_student.php?id=" . $row['id'] . "'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No students found.";
}

// Close the database connection
$conn->close();
?>

<br>
<!-- Link to the Add New Student form -->
<a href="index.php">Add New Student</a>
