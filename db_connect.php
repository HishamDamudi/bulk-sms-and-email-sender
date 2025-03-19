<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name="msgsender";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$database_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
session_start(); // Start the session

?>