
<?php
include(__DIR__ . '/../partials/head2.php');
include(__DIR__ . '/../dpconfig.php');

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
$filterPlacePath=$phpPlacesArray;
?>

<section class="officeLocation">
  <div class="office-upper">
    <h1>Have You !</h1>
  </div>
  <div class="form">
<form action="/../search/filterSearch.php" method="POST">
    <select class="form-select py-2 my-2" aria-label="Default select example" name="location">
      <?php foreach($filterPlacePath[0]->places as $locations){?>
  
        <option> <?php echo $locations ?></option>
    <?php } ?>
      
    </select>
  <div class="form-bottom">

    <select class="form-select py-2 my-2" aria-label="Default select example" name="purpose">
      <?php foreach($filterPlacePath[0]->tag as $tags){ ?>
        <option ><?php echo $tags ?></option>
     <?php } ?>
    </select>
    <select class="form-select py-2 my-2" aria-label="Default select example" name="price">
      <option>Price</option>
      <?php foreach($filterPlacePath[0]->price as $prices){ ?>
      <option><?php echo $prices ?></option>
   <?php } ?>
      </select>
      <button type="submit" class="btn btn-primary">Search</button>
  </div>
</form>
  </div>
</section>

<div class="container mt-4 pt-4">
  <div class="row row-cols-2 g-1">
    <div class="col-lg-3 filter-search">
        <div class="container">
            <div class="row col-lg-12 my-2">
                <div
                  class="text d-flex justify-content-between py-3 col-lg-12 col-md-6 col-sm-12"
                >
                  <h3>Filter Search</h3>
                </div>
              </div>

            <!--Search Form Element -->
              <form action="/../search/filterSearch.php" method="POST" class="fs-3">
                <select class="form-select py-2 my-2" aria-label="Default select example" name="location">
                <?php foreach($filterPlacePath[0]->places as $locations){?>
  
  <option> <?php echo $locations ?></option>
<?php } ?>
                  
                </select>
                <select class="form-select py-2 my-2" aria-label="Default select example" name="purpose">
                <?php foreach($filterPlacePath[0]->tag as $tags){ ?>
        <option ><?php echo $tags ?></option>
     <?php } ?>
                </select>
                <select class="form-select py-2 my-2" aria-label="Default select example" name="price">
                  <option>Price</option>
                  <?php foreach($filterPlacePath[0]->price as $prices){ ?>
      <option><?php echo $prices ?></option>
   <?php } ?>
                </select>
                <select class="form-select py-2 my-2" aria-label="Default select example" name="sortRange">
                  <option>Range</option>
                  <option>High to Low</option>
                  <option>Low To high</option>
                </select>
                <button type="submit" class="btn btn-primary">Search Your Filter</button>
              </form>


              <div class="my-4 py-4 off-location">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3442.5029885993063!2d78.08096727535379!3d30.365072003308743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3908d7ab3e42c267%3A0xa0f0967f0adbd869!2sShourya%20Residency!5e0!3m2!1sen!2sin!4v1693877430803!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>

        </div>
    </div>
    <div class="album col-lg-8 py-5 bg-body-ternary m-auto medium-device">
        <div class="container">
          <div class="row col-lg-12 my-2">
            <div
              class="text d-flex justify-content-between py-3 col-lg-12 col-md-6 col-sm-12"
            >
              <h2>All Properties</h2>
            <h5> Total <?php echo count($filePath) ?></h5>
            </div>
          </div>
      
          <form action="/../php/list.php" method="POST">
            <div class="row row-cols-lg-3 row-cols-md-2 align-items-center">
             <?php $countTweleve=array_slice($filePath,0,12);
             
             foreach($countTweleve as $element){
             ?>

              <div class="col">
                <button class="submit" value="<?php echo $element->id ?>" name="productId">
                  <div class="card">
                    <div class="for-sale">
                      <p><?php echo $element->tag ?></p>
                    </div>
      
                    <img src="<?php echo $element->collectionImage[0] ?>" alt="" />
                    <div class="card-body">
                      <div class="card-text d-flex justify-content-between">
                        <h5 class="card-text"><?php echo $element->buildName ?></h5>
                        <h5><?php echo $element->price ?></h5>
                      </div>
                      <div class="location col-lg-11 col-md-10">
                        <p>
                          <i class="fas fa-location mx-2"></i><?php echo $element->address ?>
                        </p>
                      </div>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group col-lg-11 col-md-10">
                          <div
                            class="d-flex py-1 col-lg-12 justify-content-between card-icons"
                          >
                            <p>
                              <i class="fas fa-bed"></i
                              ><span><?php echo $element->BHK->bed ?></span>
                            </p>
                            <p>
                              <i class="fas fa-bath"></i
                              ><span><?php echo $element->BHK->bath ?></span>
                            </p>
                            <p>
                              <i class="fas fa-maximize"></i
                              ><span><?php echo $element->size ?></span>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </button>
              </div>
           <?php } ?>
            </div>
          </form>
        </div>
      </div>
      
      <!-- Featured Listings  for small devices-->
      <!-- For small devices you can go upto 7-8 levels of value -->
      
      <div class="album col-lg-11 py-5 bg-body-tertiary m-auto featured-listing">
        <div class="container">
          <div class="row col-lg-12 my-2">
            <div
              class="text d-flex justify-content-between py-3 col-lg-12 col-md-6 col-sm-12"
            >
              <h2>All Listings</h2>
            </div>
          </div>
          <form action="/../php/list.php" method="POST">
            <div class="new-grid snap-scroller g-3">
              
            <?php
        $_firstFour= array_slice($phpArray,0,10); 
          foreach($_firstFour as $element){?>
              <div class="col">
                <button class="submit" value="<?php echo $element->id ?>" name="productId">
                  <div class="card">
                    <div class="for-sale">
                      <p><?php echo $element->tag ?></p>
                    </div>
      
                    <img src="<?php echo $element->collectionImage[0] ?>" alt="" />
                    <div class="card-body">
                      <div class="card-text d-flex justify-content-between">
                        <h5 class="card-text"><?php echo $element->buildName ?><h5>
                        <h5><?php echo $element->price ?></h5>
                      </div>
                      <div class="location col-lg-11 col-md-10">
                        <p>
                          <i class="fas fa-location mx-2"></i><?php echo $element->address ?>
                        </p>
                      </div>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group col-lg-11 col-md-10">
                          <div
                            class="d-flex py-1 col-lg-12 justify-content-between card-icons"
                          >
                            <p>
                              <i class="fas fa-bed"></i
                              ><span><?php echo $element->BHK->bed ?></span>
                            </p>
                            <p>
                              <i class="fas fa-bath"></i
                              ><span><?php echo $element->BHK->bath ?></span>
                            </p>
                            <p>
                              <i class="fas fa-maximize"></i
                              ><span><?php echo $element->size ?>span>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </button>
              </div>
              <?php } ?>       
              </div>
            </div>
          </form>
        </div>
      </div>
      
      
  </div>
</div>

<div class="links">
  <a href="/AllListing/allListing.php">1</a>
  <a href="/AllListing/allListing2.php">2</a>
  <a href="/AllListing/allListing3.php">3</a>
  <a href="/AllListing/allListing4.php">4</a>
  <a href="/AllListing/allListing5.php">5</a>
  <a href="/AllListing/allListing6.php">6</a>
  <a href="/AllListing/allListing7.php">7</a>
</div>

<?php include(__DIR__ . '/../partials/footermain.php');
?>