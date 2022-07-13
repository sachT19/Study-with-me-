<?php
// this will be in all sql exercises to ensure connection to admin
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
 
if (!$conn) {
  //die("Connection failed: " . mysqli_connect_error());
}
else{
 // echo "Connected successfully";
}
?>