<?php
// Check if a file was submitted
if (isset($_FILES["image"])) {

  // Database connection details
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "crud";

  // Create a connection to the database
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get the file details
  $file_name = $_FILES['image']['name'];
  $file_type = $_FILES['image']['type'];
  $file_size = $_FILES['image']['size'];
  $file_tmp_name = $_FILES['image']['tmp_name'];

  // Read the file content
  $fp = fopen($file_tmp_name, 'r');
  $file_content = fread($fp, $file_size);
  $file_content = addslashes($file_content);
  fclose($fp);

  // Insert the file into the database
  $sql = "INSERT INTO images (image_name, image_content) VALUES ('$file_name', '$file_content')";

  if ($conn->query($sql) === TRUE) {
    echo "Image uploaded successfully!";
  } else {
    echo "Error uploading image: " . $conn->error;
  }

  // Close the database connection
  $conn->close();
}

// Display the image
if (isset($_GET['id'])) {

  // Database connection details
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "crud";

  // Create a connection to the database
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get the image content from the database
  $id = $_GET['id'];
  $sql = "SELECT image_content, image_type FROM images WHERE id=$id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $image_content = $row['image_content'];
    $image_type = $row['image_type'];

    // Output the image
    header("Content-type: $image_type");
    echo $image_content;
  } else {
    echo "Image not found!";
  }

  // Close the database connection
  $conn->close();
}
?>

<!-- HTML form to submit the image -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
  <input type="file" name="image">
  <input type="submit" name="submit" value="Upload">
</form>

<!-- Display an image from the database -->
<img src="image.php?id=1" alt="Image 1">