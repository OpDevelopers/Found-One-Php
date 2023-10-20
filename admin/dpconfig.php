<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foundone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn, "SET  time_zone = '+5:30'") or die(mysqli_error($conn));
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    // printf("connection successful");
}


?>