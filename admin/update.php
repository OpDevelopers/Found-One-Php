<?php
session_start();

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION["admin_username"])) {
    header("Location: admin.php");
    exit();
}


include '../dpconfig.php'; // Include your database connection code here

$product_id = $_GET['id'];
$sql = "SELECT * FROM data WHERE id={$product_id} ";
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

  </head>
  <body>
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
          </li> -->
        </ul>
        <hr>
        <div class="dropdown">
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>

      </div>



<div class="content">
    <div class="container-fluid p-5">
        <div class="row ">
            <div class="col-md-12">
                <div class="card p-5">
                    <div class="header">
                        <h4 class="title">Update Project</h4>
                    </div>
                    <div class="content">
                        <form action="./update-process.php?id=<?=$data['id']?>"  method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5 m-3">
                                    <div class="form-group">
                                        <label>Project ID</label>
                                        <input type="text" class="form-control" value="<?=$data['product_id']?>"  placeholder="project name"  name="product_id" >
                                    </div>
                                </div>
                                <div class="col-md-5 m-3">
                                    <div class="form-group">
                                        <label>Tag</label>
                                        <input type="text" class="form-control" value="<?=$data['tag']?>"  placeholder="Tag " name="tag" >
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Images</label>
                                        <input type="file" class="form-control" value="<?=$data['project_name']?>" placeholder="Home Address"  name="fileUpload[]" multiple >
                                    </div>
                                </div>
                            </div> -->

                            <div class="row">
                                <div class="col-md-12 m-3">
                                    <div class="form-group">
                                        <label>Featured or recent</label>
                                        <input type="text" class="form-control" value="<?=$data['fandrTag']?>" placeholder="Featured or recent" name="fandrTag" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Apartment</label>
                                        <input type="text" class="form-control" value="<?=$data['apartment']?>" placeholder="Apartment" name="apartment" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Building Name</label>
                                        <input type="text" class="form-control" value="<?=$data['buildName']?>" placeholder="Building Name" name="buildName" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" class="form-control" value="<?=$data['price']?>" placeholder="Price" name="price" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Size</label>
                                        <input type="number" class="form-control" value="<?=$data['size']?>" placeholder="Size" name="size" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" value="<?=$data['address']?>" placeholder="Address" name="address" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" value="<?=$data['city']?>" placeholder="City" name="city" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>VideoLink</label>
                                        <input type="text" class="form-control" value="<?=$data['videolink']?>" placeholder="VideoLink" name="videolink" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Bed</label>
                                        <input type="number" class="form-control" value="<?=$data['bed']?>" placeholder="Bed" name="bed" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Bath</label>
                                        <input type="number" class="form-control" value="<?=$data['bath']?>" placeholder="Bath" name="bath" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>kitchen</label>
                                        <input type="number" class="form-control" value="<?=$data['kitchen']?>" placeholder="Kitchen" name="kitchen" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Description one</label>
                                        <input type="text" class="form-control" value="<?=$data['d_one']?>" placeholder="Description One" name="d_one" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Description Two</label>
                                        <input type="text" class="form-control" value="<?=$data['d_two']?>" placeholder="Description Two" name="d_two" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Description Three</label>
                                        <input type="text" class="form-control" value="<?=$data['d_three']?>" placeholder="Description Three" name="d_three" >
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Description four</label>
                                        <input type="text" class="form-control" value="<?=$data['d_four']?>" placeholder="Description Four" name="d_four" >
                                    </div>
                                </div>
                                <div class="col-md-4 m-3">
                                    <div class="form-group">
                                        <label>Map Location</label>
                                        <input type="text" class="form-control" value="<?=$data['mapLocation']?>" placeholder="Map Location" name="mapLocation" >
                                    </div>
                                </div>
                                
                                <button type="submit" name="update" class="btn btn-info btn-fill pull-right m-3">Update project</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>


<?php include(__DIR__ . '/../partials/footermain.php');
?>