<?php

session_start();

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION["admin_username"])) {
    header("Location: index.php");
    exit();
}

include '../dpconfig.php';


include(__DIR__."../dpconfig.php");
$sql = "SELECT * FROM data";
$result = $conn->query($sql);
$sqlimg = "SELECT * FROM image";
$imgresult = $conn->query($sqlimg);

$dataArray = array(); // Initialize the data array

if ($result) {
  while ($row = $result->fetch_assoc()) {
      $jsonDataTwo = (object)array(
          'id' => $row['id'],
          'tag' => $row['tag'],
          'fandrTag' => $row['fandrTag'],
          'apartment' => $row['apartment'],
          'buildName' => $row['buildName'],
          'price' => $row['price'],
          'size' => $row['size'],
          'address' => $row['address'],
          'city' => $row['city'],
          'BHK' => (object)array(
              'bed' => (int)$row['bed'], // Convert to integer if needed
              'bath' => (int)$row['bath'],
              'kitchen' => (int)$row['kitchen']
          ),
          'description' => array($row['d_one'],$row['d_two'],$row['d_three'],$row['d_four']),
          'collectionImage' => array(),
          'linkVideo' => $row['videolink'], // Renamed to match your structure
          'mapLocation' => $row['mapLocation'] // Renamed to match your structure
      );

      $dataArray[] = $jsonDataTwo;
  }
}

if ($imgresult) {
  while ($row = $imgresult->fetch_assoc()) {
      $product_id = $row['product_id'];
      $dataIndex = array_search($product_id, array_column($dataArray, 'id'));

      if ($dataIndex !== false) {
          if (!isset($dataArray[$dataIndex]->collectionImage)) {
              $dataArray[$dataIndex]->collectionImage = array();
          }
          $image = $row['image'];
          $dataArray[$dataIndex]->collectionImage[] = "/images/". $image;
      }
  }
}

// Now $dataArray contains the structured data

// Debug to check the structure

// Encode the data array as JSON
$phpArray = $dataArray;

if ($phpArray !== false) {
    // Save the JSON data to a file or send it as a response to the client
    // header('Content-Type: application/json');
} else {
    echo "Failed to encode data as JSON.";
}

$places='[
  {
  "places": [
    "Places",
    "Robbers Cave",
    "Shastradhara Road",
    "Chakrata Road",
    "Forest Research Institute",
    "Clock Tower"
  ],
  "tag": ["sale", "rent"],
  "price": ["1 cr", "75 Lacs", "50 Lacs", "25 lacs", "20 lacs"],
  "amenity": [
    "Parking",
    "Refrigeration",
    "Fitness Gym",
    "Laundry",
    "Fireplace",
    "Basement"
  ]
  }
]';

$phpPlacesArray = json_decode($places);



// Define file paths
$filePath = $phpArray; // Update with your JSON file path
$filterPlacePath = $phpPlacesArray;

$sql = "SELECT * FROM data ";
$resp = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($resp);
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
    <style>
        .navbar{
            top:0px;
        }
    </style>
  </head>
  <body>

<div class="container">
        <div class="row row-cols-2">


        
    <div class="col-12 d-flex flex-column flex-shrink-0 p-3 text-bg-dark">
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
          <!-- <li>
            <a href="/viewListing" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
              View Listing
            </a>
          </li>
          <li>
            <a href="/adminRecent" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
              Recent Property
            </a>
          </li> -->
          <!-- <li>
            <a href="/adminFeatured" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              Featured Properties
            </a>
          </li> -->
          <li>
            <a href="./enquiries.php" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              enquiries
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown">
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>

      </div>

      <div class="container col-lg-12">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Projects list table</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Image</th>
                                <th>Project Name</th>
                                <th>Address</th>
                                <th>About</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM data";
                                $res = mysqli_query($conn, $sql);

                                if (!$res) {
                                    die("Query failed: " . mysqli_error($conn));
                                }

                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];

                                    // Fetch images for the current project
                                    $sql1 = "SELECT * FROM image WHERE product_id = '$id'";
                                    $res1 = mysqli_query($conn, $sql1);

                                    if (!$res1) {
                                        // Handle the case where the query for images failed
                                        echo "Error fetching images: " . mysqli_error($conn);
                                        continue; // Skip this iteration and move to the next row
                                    }

                                    // Fetch image data
                                    $data = mysqli_fetch_assoc($res1);
                                    ?>

                                    <tr>
                                        <td> <img src="/images/<?= $data['image'] ?> " alt="<?= $data['image'] ?>"
                                                  height="100px"> </td>
                                        <td> id : <?= $row['id'] ?>, <?= $row['buildName'] ?> </td>
                                        <td> <?= $row['address'] ?>,<?= $row['city'] ?>
                                        </td>
                                        <td> <?= $row['fandrTag'] ?> </td>
                                        <td>
                                            <a href="/admin/update.php?id=<?= $row['id'] ?>" class="mx-3"
                                               style="color: green;">
                                                <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
                                            </a>
                                            <a href="/admin/delete.php?id=<?= $row['id'] ?>"
                                               style="color: red;">
                                                <i class="fa fa-trash " aria-hidden="true"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    // Close the result set for images
                                    mysqli_free_result($res1);
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include(__DIR__ . '/../partials/footermain.php');
?>