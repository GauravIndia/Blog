<?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "blog";
  $conn = new mysqli($servername, $username, $password,$dbname);
  if ($conn->connect_error) {
    header("location:error.php");
    exit();
  }
?>
