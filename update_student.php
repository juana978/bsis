<?php
include 'connection.php'; // ensure meron kang connection.php

// Process update form submission
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $student_id = $_POST['student_id'];
    $year_level = $_POST['year_level'];
    $course = $_POST['course'];
    $date_of_birth = $_POST['date_of_birth'];
    $contact_no = $_POST['contact_no'];

    $query = "UPDATE students SET 
                name='$name',
                gender='$gender',
                student_id='$student_id',
                year_level='$year_level',
                course='$course',
                date_of_birth='$date_of_birth',
                contact_no='$contact_no'
              WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Student updated successfully!'); window.location.href='view_student.php';</script>";
    } else {
        echo "<script>alert('Error updating student.');</script>";
    }
}

// Fetch student data if ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('No student selected!'); window.location.href='view_student.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student - BSIS System</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; }
        .sidebar { height: 100vh; width: 220px; background-color: #2c3e50; position: fixed; padding-top: 30px; }
        .sidebar a { padding: 15px; text-decoration: none; font-size: 18px; color: white; display: block; }
        .sidebar a:hover { background-color: #34495e; }
        .content { margin-left: 220px; padding: 20px; }
        h1 { color: #2c3e50; }
        form { max-width: 500px; background: #f4f4f4; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc; }
        button { padding: 10px 20px; background: #2980b9; color: white; border: none; cursor: pointer; border-radius: 5px; }
        button:hover { background: #3498db; }
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
    <h1>Update Student</h1>
    <form action="update_student.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>Full Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>

        <label>Gender</label>
        <select name="gender" required>
            <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
        </select>

        <label>Student ID</label>
        <input type="text" name="student_id" value="<?php echo htmlspecialchars($row['student_id']); ?>" required>

        <label>Year Level</label>
        <select name="year_level" required>
         <option value="First Year" <?php if ($row['year_level'] == 'First Year') echo 'selected'; ?>>Second Year</option>
            <option value="Second Year" <?php if ($row['year_level'] == 'Third Year') echo 'selected'; ?>>Third Year</option>
            <option value="Fourth Year" <?php if ($row['year_level'] == 'Fourth Year') echo 'selected'; ?>>Fourth Year</option>
        </select>

        <label>Course</label>
        <input type="text" name="course" value="<?php echo htmlspecialchars($row['course']); ?>" required>

        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>" required>

        <label>Contact No.</label>
        <input type="text" name="contact_no" value="<?php echo htmlspecialchars($row['contact_no']); ?>" required>

        <button type="submit" name="update">Update Student</button>
    </form>
</div>

</body>
</html>