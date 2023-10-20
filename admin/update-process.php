<?php
session_start();

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION["admin_username"])) {
    header("Location: admin.php");
    exit();
}

include '../dpconfig.php';
$product_id = $_GET['id'];

if(isset($_POST["update"])){
  $id1 = intval($_POST['product_id']);
  $tag = mysqli_real_escape_string($conn, $_POST['tag']);
  $fandrTag = mysqli_real_escape_string($conn, $_POST['fandrTag']);
  $apartment = mysqli_real_escape_string($conn, $_POST['apartment']);
  $buildingName = mysqli_real_escape_string($conn, $_POST['buildName']);
  $price = floatval($_POST['price']);
  $size = floatval($_POST['size']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  // $city = mysqli_real_escape_string($conn, $_POST['city']);
  $bed = intval($_POST['bed']);
  $bath = intval($_POST['bath']);
  $kitchen = intval($_POST['kitchen']);
  $d_one = mysqli_real_escape_string($conn, $_POST['d_one']);
  $d_two = mysqli_real_escape_string($conn, $_POST['d_two']);
  $d_three = mysqli_real_escape_string($conn, $_POST['d_three']);
  $d_four = mysqli_real_escape_string($conn, $_POST['d_four']);
  $videoLink = mysqli_real_escape_string($conn, $_POST['videolink']);
  $mapLocation = mysqli_real_escape_string($conn, $_POST['mapLocation']);

$sql = " UPDATE `data` SET `product_id`='$id1', `tag`='$tag', `fandrTag`='$fandrTag', `apartment`='$apartment',`buildName`='$buildingName',`price`='$price',`size`='$size',`address`='$address',`videolink`='$videoLink',`bed`='$bed',`bath`='$bath',`kitchen`='$kitchen',`d_one`='$d_one',`d_two`='$d_two',`d_three`='$d_three',`d_four`='$d_four',`mapLocation`='$mapLocation' WHERE `id` ='$product_id' ";
$result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
if(!$result){
    echo "error:" . $sql;
}else{    
    echo " <script>
    alert('update succesfully');
        window.location.href = '../list.php'
    </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/images/foundOne.svg" type="image/x-icon" />
    <title>Found One</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../Css/style.css" />

  </head>
  <body>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="./admin.php" class="nav-link active" aria-current="page">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
              Home
            </a>
          </li>
          <li>
            <a href="./listing.php" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
              New Listing
            </a>
          </li>
          <li>
            <a href="./viewListing.php" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
              View Listing
            </a>
          </li>
          <!-- <li>
            <a href="" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
              Recent Property
            </a>
          </li>
          <li>
            <a href="/adminFeatured" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              Featured Properties
            </a>
          </li> -->
        </ul>
        <hr>
        <div class="dropdown">
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>

      </div>

