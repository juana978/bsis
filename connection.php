<?php
$servername = "127.0.0.1"; // Use 127.0.0.1 instead of localhost
$username = "root";
$password = "root"; // empty lang
$database = "bsis_students";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>