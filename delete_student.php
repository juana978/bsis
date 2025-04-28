<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Student deleted successfully!'); window.location.href='view_student.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>