<?php
include 'connection.php'; // para may database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - BSIS Student Information System</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f8fb;
        }
        .sidebar {
            height: 100vh;
            width: 220px;
            background-color: #003366;
            position: fixed;
            padding-top: 30px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #0059b3;
        }
        .content {
            margin-left: 240px;
            padding: 30px;
        }
        h1 {
            color: #003366;
            margin-bottom: 20px;
        }
        .button-container {
            margin-bottom: 30px;
        }
        .year-button {
            background-color: #0059b3;
            color: white;
            padding: 10px 20px;
            margin: 10px 5px 10px 0;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        .year-button:hover {
            background-color: #007bff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #ffcc00;
            color: #003366;
            font-size: 16px;
        }
        tr:nth-child(even) {
            background-color: #f2f9ff;
        }
        tr:hover {
            background-color: #e6f2ff;
        }
    </style>

    <script>
        function loadStudents(year) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_students.php?year=" + encodeURIComponent(year), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('student-list').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>

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
    <h1>Welcome to BSIS Student Information System</h1>

    <div class="button-container">
        <button class="year-button" onclick="loadStudents('First Year')">First Year</button>
        <button class="year-button" onclick="loadStudents('Second Year')">Second Year</button>
        <button class="year-button" onclick="loadStudents('Third Year')">Third Year</button>
        <button class="year-button" onclick="loadStudents('Fourth Year')">Fourth Year</button>
    </div>

    <div id="student-list">
        <p>Select a Year Level to view students.</p>
    </div>

</div>

</body>
</html>