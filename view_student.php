<?php
include 'connection.php'; // Gamitin natin yung connection.php mo para standard

// Fetch students
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Students - BSIS Student Information System</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f8;
        }
        .sidebar {
            height: 100vh;
            width: 220px;
            background-color: #2c3e50;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 30px;
        }
        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .content {
            margin-left: 240px;
            padding: 30px;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            margin: 2px;
            display: inline-block;
        }
        .btn-edit {
            background-color: #2ecc71;
        }
        .btn-delete {
            background-color: #e74c3c;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="dashboard.php">Dashboard</a>
    <a href="add_student.php">Add Student</a>
    <a href="view_student.php">View Students</a>
    <a href="total_students.php">View Total Students</a>
    <a href="logout.php">Logout</a>
</div>

<div class="content">
    <h1>Student List</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Student ID</th>
            <th>Year Level</th>
            <th>Course</th>
            <th>Date of Birth</th>
            <th>Contact No</th>
            <th>Actions</th>
        </tr>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['gender']."</td>";
                echo "<td>".$row['student_id']."</td>";
                echo "<td>".$row['year_level']."</td>";
                echo "<td>".$row['course']."</td>";
                echo "<td>".$row['date_of_birth']."</td>";
                echo "<td>".$row['contact_no']."</td>";
                echo "<td class='action-buttons'>
                        <a class='btn btn-edit' href='edit_student.php?id=".$row['id']."'>Edit</a>
                        <a class='btn btn-delete' href='delete_student.php?id=".$row['id']."' onclick='return confirm(\"Are you sure you want to delete this student?\")'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No students found.</td></tr>";
        }
        ?>
    </table>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>