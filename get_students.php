<?php
include 'connection.php';

$year = isset($_GET['year']) ? $_GET['year'] : '';

if ($year != '') {
    $sql = "SELECT * FROM students WHERE year_level = '$year' ORDER BY name ASC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Student ID</th>
                <th>Year Level</th>
                <th>Course</th>
                <th>Date of Birth</th>
                <th>Contact No</th>
              </tr>";

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
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No students found for $year.</p>";
    }
} else {
    echo "<p>Please select a year level.</p>";
}

mysqli_close($conn);
?>