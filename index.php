<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Student Information Form</h2>
        <form action="submit_form.php" method="POST">
            <label for="firstname">First Name:</label><br>
            <input type="text" id="firstname" name="firstname" required><br><br>

            <label for="middlename">Middle Name:</label><br>
            <input type="text" id="middlename" name="middlename" required><br><br>

            <label for="lastname">Last Name:</label><br>
            <input type="text" id="lastname" name="lastname" required><br><br>

            <label for="age">Age:</label><br>
            <input type="number" id="age" name="age" required><br><br>

            <label for="address">Address:</label><br>
            <textarea id="address" name="address" required></textarea><br><br>

            <label for="course">Course:</label><br>
            <input type="text" id="course" name="course" required><br><br>

            <label for="section">Section:</label><br>
            <input type="text" id="section" name="section" required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <br>
    <a href="students.php">View Students</a>
</body>
</html>
