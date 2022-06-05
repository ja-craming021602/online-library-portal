<?php
$servername = "localhost";
$username = "root";
$database = "onlinelibraryportal";

// Create connection
$conn = mysqli_connect($servername, $username, "", $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>