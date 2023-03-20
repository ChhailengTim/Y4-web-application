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

$name = '';
$age = '';
$address = '';
$id = '';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (!isset($_GET['id'])) {
        header('location: ./index.php');
        exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

    $name = $row['name'];
    $age = $row['age'];
    $address = $row['address'];
} else {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $id = $_GET['id'];
    if ($id) {
        $sql = "UPDATE users SET name='$name',age='$age',address='$address' WHERE id=$id";
        $result = $conn->query($sql);
    } else {
        echo "<script>alert('Error')</script>";
        die();
    }
    $conn->close();

    header('location: ./index.php');
    exit;
}
?>



<!DOCTYPE html>
<html>

<body>

    <div class="container">
        <h2>HTML Forms</h2>
        <form method="POST">
            <input type="hidden" name="id " value='<?php echo $id ?>'><br><br>
            <label for="name">Name:</label><br>
            <input type="text" name="name" value='<?php echo $name ?>'><br><br>
            <label for="age">Age:</label><br>
            <input type="text" name="age" value='<?php echo $age ?>'><br><br>
            <label for="address">Address:</label><br>
            <input type="text" name="address" value='<?php echo $address ?>'><br><br>
            <button type="submit" class="update" name="update-btn">Update</button>
        </form>
    </div>

    <p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>

</html>