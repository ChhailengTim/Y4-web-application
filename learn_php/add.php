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




if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit-btn'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
    }
    $sql = "INSERT INTO users (name, age,address) VALUES ('$name', '$age','$address')";
    $result = mysqli_query($conn, $sql);
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
            <label for="name">Name:</label><br>
            <input type="text" name="name" value=""><br><br>
            <label for="age">Age:</label><br>
            <input type="text" name="age" value=""><br><br>
            <label for="address">Address:</label><br>
            <input type="text" name="address" value=""><br><br>
            <!-- <input type="submit" value="Submit"> -->
            <button type="submit" class="add" name="submit-btn">Submit</button>
        </form>
    </div>

    <p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>

</html>