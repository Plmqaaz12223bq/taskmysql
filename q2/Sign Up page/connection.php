<?php
$servername='localhost';
$dbusername='root';
$password='';
$database='project';

$conn = mysqli_connect($servername,$dbusername, $password,$database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>