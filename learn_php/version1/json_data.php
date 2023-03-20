<?php
$server = "localhost";
$host = "root";
$pass = "";
$dbname = "crud";

$conn = mysqli_connect($server, $host, $pass, $dbname);

$result = $conn->query("SELECT * FROM users");
$data = $result->fetch_all(MYSQLI_ASSOC);


// Set the content type header
header('Content-Type: application/json');

// Output the user information as JSON
echo json_encode($data);
