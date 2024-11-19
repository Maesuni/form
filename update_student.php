<?php
include('db_config.php');  // Include the database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $course = $_POST['course'];
        $section = $_POST['section'];

        $update_sql = "UPDATE students SET firstname = ?, middlename = ?, lastname = ?, age = ?, address = ?, course = ?, section = ? WHERE id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("sssssssi", $firstname, $middlename, $lastname, $age, $address, $course, $section, $id);

        if ($stmt->execute()) {
            echo "Student updated successfully.";
            echo "<br><a href='students.php'>Back to Student List</a>";
        } else {
            echo "Error updating student: " . $stmt->error;
        }
    }
?>

<h2>Update Student</h2>
<form action="update_student.php?id=<?php echo $id; ?>" method="POST">
    <label for="firstname">First Name:</label><br>
    <input type="text" id="firstname" name="firstname" value="<?php echo $student['firstname']; ?>" required><br><br>

    <label for="middlename">Middle Name:</label><br>
    <input type="text" id="middlename" name="middlename" value="<?php echo $student['middlename']; ?>" required><br><br>

    <label for="lastname">Last Name:</label><br>
    <input type="text" id="lastname" name="lastname" value="<?php echo $student['lastname']; ?>" required><br><br>

    <label for="age">Age:</label><br>
    <input type="number" id="age" name="age" value="<?php echo $student['age']; ?>" required><br><br>

    <label for="address">Address:</label><br>
    <textarea id="address" name="address" required><?php echo $student['address']; ?></textarea><br><br>

    <label for="course">Course:</label><br>
    <input type="text" id="course" name="course" value="<?php echo $student['course']; ?>" required><br><br>

    <label for="section">Section:</label><br>
    <input type="text" id="section" name="section" value="<?php echo $student['section']; ?>" required><br><br>

    <input type="submit" value="Update Student">
</form>

<?php
} else {
    echo "No student found with that ID.";
}

$conn->close();
?>
