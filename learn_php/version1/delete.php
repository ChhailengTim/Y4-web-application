<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    $conn->query($sql);
}
header('location: ./index.php');
exit;
