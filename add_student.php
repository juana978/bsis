<?php
// connection to database
include 'connection.php';

// If may na-submit na form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $student_id = $_POST['student_id'];
    $year_level = $_POST['year_level'];
    $course = $_POST['course'];
    $date_of_birth = $_POST['date_of_birth'];
    $contact_no = $_POST['contact_no'];

    // Insert to database
    $sql = "INSERT INTO students (name, gender, student_id, year_level, course, date_of_birth, contact_no)
            VALUES ('$name', '$gender', '$student_id', '$year_level', '$course', '$date_of_birth', '$contact_no')";

    if (mysqli_query($conn, $sql)) {
        // Pag successful, redirect sa dashboard
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student - BSIS System</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; }
        .sidebar { height: 100vh; width: 220px; background-color: #2c3e50; position: fixed; padding-top: 30px; }
        .sidebar a { padding: 15px; text-decoration: none; font-size: 18px; color: white; display: block; }
        .sidebar a:hover { background-color: #34495e; }
        .content { margin-left: 220px; padding: 20px; }
        h1 { color: #2c3e50; }
        form { max-width: 500px; }
        input, select { width: 100%; padding: 10px; margin: 10px 0; }
        button { padding: 10px 20px; background: #2980b9; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="dashboard.php">Dashboard</a>
    <a href="add_student.php">Add Student</a>
    <a href="view_student.php">View Students</a>
        <a href="total_students.php">Total Students</a>
    <a href="logout.php">Logout</a>
</div>

<div class="content">
    <h1>Add New Student</h1>
    <form action="add_student.php" method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <input type="text" name="student_id" placeholder="Student ID" required>
        <select name="year_level" required>
            <option value="">Select Year Level</option>
            <option value="First Year">First Year</option>
            <option value="Second Year">Second Year</option>
            <option value="Third Year">Third Year</option>
            <option value="Fourth Year">Fourth Year</option>
        </select>
        <input type="text" name="course" placeholder="Course" required>
         
         
        <input type="date" name="date_of_birth" placeholder="Date of Birth" required>
        
        <input type="text" name="contact_no" placeholder="Contact No" required>
        <button type="submit">Add Student</button>
    </form>
</div>

</body>
</html>