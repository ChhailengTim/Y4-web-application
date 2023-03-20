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
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>User Crud</h2>
        <button class="add"><a href="./add.php">Add</button>

        <table>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
            </tr>

            <?php
            $sql = "SELECT * FROM users ";
            $result = $conn->query($sql);
            if (!$result) {
                die("Error get data");
            }
            while ($row = $result->fetch_assoc()) {
                echo "
        <tr>
        <td>$row[name]</td>
        <td>$row[age]</td>
        <td>$row[address]</td>  
        <td>
        <button class='edit'> <a href='./update.php?id=$row[id]'>edit</button>
        <button class='delete'> <a href='./delete.php?id=$row[id]'>delete</button>    
       
    </td>
    </tr>
        ";
            }
            ?>

        </table>
    </div>

</body>

</html>