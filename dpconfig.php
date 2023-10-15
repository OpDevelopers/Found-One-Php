<?php
$servername = "localhost";
$username = "u115488740_fOne";
$password = "ArtF0Und0ne@1122";
$dbname = "u115488740_artFOne";

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