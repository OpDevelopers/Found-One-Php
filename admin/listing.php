<?php

session_start();

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION["admin_username"])) {
    header("Location: admin.php");
    exit();
}
include('../dpconfig.php');

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


        
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
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
          </li>
          <li> -->
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

      <div class="col-8 m-auto my-5 py-5">
  <h3>New Posting</h3>
  <form
    action=""
    method="post"
    id="property_form"
    class="row row-cols-2"
    enctype="multipart/form-data"
  >
    <div class="mb-3">
      <label for="id" class="form-label">Prduct Id</label>
      <input
        type="text"
        class="form-control my-1"
        id="formId"
        name="product"
        placeholder="productId"
        aria-describedby="emailHelp"
        required
      />
    </div>
    <!-- <div class="mb-3">
      <label for="id" class="form-label">Product Name</label>
      <input
        type="number"
        class="form-control my-1"
        id="formId"
        name="productName"
        placeholder="product number"
        aria-describedby="emailHelp"
      />
    </div> -->
    <div class="mb-3">
      <label for="tag" class="form-label">Rent, Lease , Sale etc.</label>
      <input
        type="text"
        class="form-control my-1"
        id="tag"
        name="tag"
        placeholder="Rent,Lease or Sale"
        required
      />
    </div>
    <div class="mb-3">
      <label for="fandrTag" class="form-label"
        >Featured and Recent Listings</label
      >
      <input
        type="text"
        class="form-control my-1"
        id="fandrTag"
        name="fandrTag"
        placeholder="Featured and Recent Listings"
        required
      />
    </div>
    <div class="mb-3">
      <label class="form-check-label" for="apartment">Apartment</label>
      <input
        type="text"
        name="apartment"
        class="form-control my-1"
        id="exampleCheck1"
        placeholder="BHK"
        required
      />
    </div>
    <div class="mb-3">
      <label class="form-check-label" for="buildName">Building Name</label>
      <input
        type="text"
        class="form-control my-1"
        id="buildingName"
        name="buildingName"
        placeholder="ABC apartments"
        required
      />
    </div>
    <div class="mb-3">
      <label class="form-check-label" for="Price">Price</label>
      <input
        type="text"
        class="form-control my-1"
        id="price"
        name="price"
        placeholder="1 crore😊"
        required
      />
    </div>
    <div class="mb-3">
      <label class="form-check-label" for="size">Size</label>
      <input
        type="text"
        class="form-control my-1"
        id="number"
        name="size"
        placeholder="Size"
        required
      />
    </div>
    <div class="mb-3">
      <label class="form-check-label" for="Address">Address</label>
      <input
        type="text"
        class="form-control my-1"
        id="address"
        name="address"
        placeholder="Address"
        required
      />
    </div>
    <div class="mb-3">
      <label class="form-check-label" for="city">City</label>
      <input
        type="text"
        class="form-control my-1"
        id="city"
        name="city"
        placeholder="city"
        required
      />
    </div>
    <div class="mb-3">
      <label class="form-check-label" for="BHK">BHK</label>
      <input
        type="text"
        class="form-control my-1"
        id="bed"
        name="bed"
        placeholder="bed"
        required
      />
      <input
        type="text"
        class="form-control my-1"
        id="bath"
        name="bath"
        placeholder="bath"
        required
      />
      <input
        type="text"
        class="form-control my-1"
        id="kitchen"
        name="kitchen"
        placeholder="kitchen"
      />
    </div>
    <div class="mb-3">
      <label class="form-check-label" for="Description">Description</label>
      <input
        type="text"
        class="form-control my-1"
        id="d_one"
        name="d_one"
        placeholder="Description 1"
        required
      />
      <input
        type="text"
        class="form-control my-1"
        id="d_two"
        name="d_two"
        placeholder="Description 2"
        required
      />
      <input
        type="text"
        class="form-control my-1"
        id="d_three"
        name="d_three"
        placeholder="Description 3"
      />
      <input
        type="text"
        class="form-control my-1"
        id="d_four"
        name="d_four"
        placeholder="Description 3"
      />
    </div>

    <div class="mb-3">
      <label class="form-check-label" for="uploadImages">Images</label>
      <input type="file" name="uploadImages[]" multiple accept="image/*" required/>
    </div>
    <div class="mb-3">
      <label class="form-check-label" for="uploadImages">Video Link</label>
      <input
        type="text"
        class="form-control my-1"
        id="videoLink"
        name="videoLink"
        placeholder="Video Link"
      />
    </div>
    <div class="mb-3">
      <label class="form-check-label" for="uploadImages">Map Location</label>
      <input
        type="text"
        class="form-control my-1"
        id="videoLink"
        name="mapLocation"
        placeholder="Map Locations"
      />
    </div>

    <button type="submit" name="submit" id="submit_Button" class="btn btn-primary">Add New Data</button>
  </form>
</div>



</div>
</div>


<script src="/newListingScript.js"></script>
<?php

if(isset($_POST["submit"])){
    // Sanitize and validate input
    $id = intval($_POST['product']);
    $tag = mysqli_real_escape_string($conn, $_POST['tag']);
    $fandrTag = mysqli_real_escape_string($conn, $_POST['fandrTag']);
    $apartment = mysqli_real_escape_string($conn, $_POST['apartment']);
    $buildingName = mysqli_real_escape_string($conn, $_POST['buildingName']);
    $price = floatval($_POST['price']);
    $size = floatval($_POST['size']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $bed = intval($_POST['bed']);
    $bath = intval($_POST['bath']);
    $kitchen = intval($_POST['kitchen']);
    $d_one = mysqli_real_escape_string($conn, $_POST['d_one']);
    $d_two = mysqli_real_escape_string($conn, $_POST['d_two']);
    $d_three = mysqli_real_escape_string($conn, $_POST['d_three']);
    $d_four = mysqli_real_escape_string($conn, $_POST['d_four']);
    $videoLink = mysqli_real_escape_string($conn, $_POST['videoLink']);
    $mapLocation = mysqli_real_escape_string($conn, $_POST['mapLocation']);

    $date = date('Y-m-d H:i:s');

    $description = [$d_one, $d_two, $d_three, $d_four];
    $descriptionString = implode(' ', $description);

    // Prepare the SQL query using prepared statements
    $stmt = $conn->prepare("INSERT INTO `data` (`product_id`, `tag`, `fandrTag`, `apartment`, `buildName`, `price`, `size`, `address`, `city`, `date`, `videolink`, `bed`, `bath`, `kitchen`,`description`,`d_one`,`d_two`,`d_three`,`d_four`,`mapLocation`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?)");

    $stmt->bind_param("issssdssssssiiisssss", $id, $tag, $fandrTag, $apartment, $buildingName, $price, $size, $address, $city, $date, $videoLink, $bed, $bath, $kitchen, $descriptionString,$d_one,$d_two,$d_three,$d_four,$mapLocation);

    // Check if the prepare statement succeeded
    if (!$stmt) {
        die("Error preparing SQL statement: " . $conn->error);
    }
    if ($stmt->execute()) {
        $insertedId = $stmt->insert_id;

        // Handle file uploads
        $uploadsDir =  "../images";
        $allowedFileTypes = array('jpg', 'jpeg', 'png');

        foreach ($_FILES['uploadImages']['name'] as $id => $val) {
            $fileName = time() . "-" . $_FILES['uploadImages']['name'][$id];
            $tempLocation = $_FILES['uploadImages']['tmp_name'][$id];
            $targetFilePath = $uploadsDir . '/' . $fileName;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

            if (in_array($fileType, $allowedFileTypes)) {
                if (move_uploaded_file($tempLocation, $targetFilePath)) {
                    $sqlVal = $fileName;
                    $stmt = $conn->prepare("INSERT INTO image (product_id, image) VALUES (?, ?)");

                    $stmt->bind_param("ss", $insertedId, $sqlVal);
                    if (!$stmt) {
                        die("Error preparing SQL statement: " . $conn->error);
                    }

                    
                    $stmt->execute();
                } else {
                    echo "File could not be uploaded.";
                }
            } else {
                echo "Only .jpg, .jpeg, and .png file formats allowed.";
            }
        }

        echo "Data and files successfully inserted.";
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Form not submitted.";
}

$conn->close();
?>
