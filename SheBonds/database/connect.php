<?php
$servername = "localhost:3307";
$username = "root";
$password = "admin123";
$dbname = "ems";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) 
{
  echo "Connection failed: ";
}
else
echo "Connected successfully";
?>
