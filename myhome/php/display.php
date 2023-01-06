<?php
  /*print_r($_POST);
  echo "<br/>";
  print_r($_FILES);
  */
  echo "Name=".$_POST['name']."<br/>";
  echo "Email=".$_POST['email']."<br/>";
  echo "Password:".$_POST['password']."<br/>";
  echo "File Name=".$_FILES['f']['name']."<br/>";
  echo "File Error:".$_FILES['f']['error']."<br>";
  echo "File Type:".$_FILES['f']['type']."<br/>";
  echo "File Size:".$_FILES['f']['size']."<br/>";
  echo "File tmp name:".$_FILES['f']['tmp_name']."<br/>";
  move_uploaded_file($_FILES['f']['tmp_name'],
  '../image/'.$_FILES['f']['name']);
  echo "<img src=../image/".$_FILES['f']['name'].">";
  
?>

<a href="../html/createuser.html">Back</a>
