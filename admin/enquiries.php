
<?php
session_start();

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION["admin_username"])) {
    header("Location: admin.php");
    exit();
}

?>

<?php
include(__DIR__."/../dpconfig.php");
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
        .conatainer{
          margin: 0;
          padding: 0;
        }
    </style>
  </head>
  <body>

<div class="container">
        <div class="row row-cols-2">
        
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 200px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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
            <a href="/adminRecent" class="nav-link text-white">
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


      
<div class="content col-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Enquiry Table</h4>
                        <!--<p class="category">Here is a subtitle for this table</p>-->
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" style="border:1px solid black;">
                            <thead>
                                <th>Sr</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>message</th>
                                <th>property Id</th>
                                <th>property name</th>
                                <th>created on</th>

                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM enquiry ORDER BY created_On DESC";
                                $res = mysqli_query($conn, $sql);
                                $i=1;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id']
                                    
                                ?>
                                    <tr>
                                        <td> <?= $i  ?> </td>
                                        <td> <?= $row['name'] ?> </td>
                                        <td> <?= $row['phone'] ?> </td>
                                        <td> <?= $row['message'] ?> </td>
                                        <td><?= $row['propertyID'] ?></td>
                                        <td> <?= $row['propertyName'] ?> </td>
                                        <td> <?= $row['created_On'] ?> </td>
                                        <td>
                                            <a href="view_enquiry.php?id=<?=$row['id']?>" class="mx-3" style="color: yellow;">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </a>
                                            <a href="php/delete_enquiry.php?id=<?=$row['id']?>" style="color: red;">
                                                <i class="fa fa-trash " aria-hidden="true"></i> Delete
                                            </a>
                                        </td>
                                        
                                    </tr>
                                <?php
                                $i++;
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
</div>

    </div>
    </div>




</body>

<


</html>