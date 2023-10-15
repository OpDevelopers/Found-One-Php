<?php

$servername="localhost";
$username="u115488740_fOne";
$password="ArtF0Und0ne@1122";
$dbname="u115488740_artFOne";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

$_request=$_SERVER["REQUEST_URI"];


$sql = "SELECT * FROM data";
$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Query failed: " . mysqli_error($conn));
}


include(__DIR__ . '/partials/head.php');
include(__DIR__ . '/php/homeContent.php');

include(__DIR__. '/php/featured.php');

include(__DIR__. '/php/services.php');
include(__DIR__. '/php/recent.php');
include(__DIR__. '/php/location.php');
include(__DIR__. '/php/testimonial.php');

include(__DIR__ . '/partials/footermain.php');

?>
