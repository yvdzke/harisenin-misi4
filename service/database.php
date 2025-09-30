<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "mission4";


$db = mysqli_connect($hostname, $username, $password, $database);
if ($db->connect_error) {
  echo "<script>alert('Connection Failed');</script>";
    die("Error");
}
?>