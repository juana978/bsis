<?php
include 'connection.php'; // Connection to database

// Fetch total students
$sql = "SELECT COUNT(*) as total FROM students";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_students = $row['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Total Students - BSIS Student Information System</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f0f8ff;
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
            padding: 50px;
        }
        .card {
            background: white;
            max-width: 500px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 255, 0.1);
            text-align: center;
        }
        .card h1 {
            color: #3498db;
            font-size: 48px;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 22px;
            color: #2c3e50;
            margin-top: 0;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="dashboard.php">Dashboard</a>
    <a href="add_student.php">Add Student</a>
    <a href="view_student.php">View students</a>
    <a href="total_students.php">Total Students</a>
    <a href="logout.php">Logout</a>
</div>

<div class="content">
    <div class="card">
        <h1><?php echo $total_students; ?></h1>
        <p>Total Number of Students</p>
    </div>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>