<?php
include 'connection.php'; // Connection sa database

// Check kung may id na pinasa
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Kunin ang data ng student by id
    $query = "SELECT * FROM students WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $student = mysqli_fetch_assoc($result);
    } else {
        echo "Student not found.";
        exit();
    }
} else {
    echo "No student selected.";
    exit();
}

// Pag submit ng form (update)
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $student_id = $_POST['student_id'];
    $gender = $_POST['gender'];
    $year_level = $_POST['year_level'];
    $date_of_birth = $_POST['date_of_birth'];
    $contact_no = $_POST['contact_no'];

    // Update query
    $update_query = "UPDATE students SET 
        name='$name', 
        student_id='$student_id', 
        gender='$gender', 
        year_level='$year_level', 
        date_of_birth='$date_of_birth', 
        contact_no='$contact_no' 
        WHERE id='$id'";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Student updated successfully!'); window.location.href='view_student.php';</script>";
    } else {
        echo "Error updating student: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student - BSIS Student Information System</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 500px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #003366;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn-submit {
            background-color: #0059b3;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .btn-submit:hover {
            background-color: #007bff;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Student</h2>
    <form method="POST">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>

        <label>Student ID</label>
        <input type="text" name="student_id" value="<?php echo htmlspecialchars($student['student_id']); ?>" required>

        <label>Gender</label>
        <select name="gender" required>
            <option value="Male" <?php if($student['gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
        </select>

        <label>Year Level</label>
        <select name="year_level" required>
            <option value="First Year" <?php if($student['year_level'] == 'First Year') echo 'selected'; ?>>First Year</option>
            <option value="Second Year" <?php if($student['year_level'] == 'Second Year') echo 'selected'; ?>>Second Year</option>
            <option value="Third Year" <?php if($student['year_level'] == 'Third Year') echo 'selected'; ?>>Third Year</option>
            <option value="Fourth Year" <?php if($student['year_level'] == 'Fourth Year') echo 'selected'; ?>>Fourth Year</option>
        </select>
<input type="text" name="course"
placeholder="Course" required>

        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" value="<?php echo htmlspecialchars($student['date_of_birth']); ?>" required>

        <label>Contact No</label>
        <input type="text" name="contact_no" value="<?php echo htmlspecialchars($student['contact_no']); ?>" required>

        <button type="submit" name="update" class="btn-submit">Update Student</button>
    </form>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>