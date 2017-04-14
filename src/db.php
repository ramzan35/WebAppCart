<?php
$dbhost = 'Localhost';
$dbuser = 'root';
$dbpass = '';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) ;
if (!$conn)
  {
  die('Could not connect: ' . mysqli_error());
  }
mysqli_select_db("product", $conn);
?>	
