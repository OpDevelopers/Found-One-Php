<?php
include(__DIR__ . '/../partials/head.php');

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

<?php
$category = isset($_POST['category']) ? ucfirst($_POST['category']) : '';
$city = isset($_POST['cityName']) ? ucfirst($_POST['cityName']) : '';

// Specify the file path to your JSON data
$filePath = $phpArray; // Convert JSON to an associative array

if (!is_array($filePath)) {
    // Handle the case where JSON data cannot be read
    http_response_code(500);
    echo "Some error has occurred.";
    exit();
}

$filteredDescriptions = array_filter($filePath, function ($item) use ($category, $city) {
    return (
        (!$category || $item->tag === $category) &&
        (!$city || $item->city === $city || $item->city === 'Dehradun')
    );
});
?>


<!--  For Medium devices -->

<div class="album col-lg-11 py-5 my-5 bg-body-ternary m-auto medium-device">
  <div class="container">
    <div class="row col-lg-12 my-2">
      <div
        class="text d-flex justify-content-between py-3 col-lg-12 col-md-6 col-sm-12"
      >
        <h2><?php echo $city ?></h2>
      </div>
    </div>

    <form action="/list" method="POST">
      <div class="row row-cols-lg-4 row-cols-md-2 align-items-center">
       <?php foreach($filteredDescriptions as $searchedItems){
        ?>
        <div class="col">
          <button class="submit" value="<?php echo $searchedItems->id ?>" name="productId">
            <div class="card">
              <div class="for-sale">
                <p><?php echo $searchedItems->tag ?></p>
              </div>

              <img src="<?php echo $searchedItems->collectionImage[0] ?>" alt="" />
              <div class="card-body">
                <div class="card-text d-flex justify-content-between">
                  <h5 class="card-text"><?php echo $searchedItems->buildName ?></h5>
                  <h5><?php echo $searchedItems->price ?></h5>
                </div>
                <div class="location col-lg-11 col-md-10">
                  <p>
                    <i class="fas fa-location mx-2"></i><?php echo $searchedItems->address ?>
                  </p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group col-lg-11 col-md-10">
                    <div
                      class="d-flex py-1 col-lg-12 justify-content-between card-icons"
                    >
                      <p>
                        <i class="fas fa-bed"></i
                        ><span><?php echo $searchedItems->BHK->bed ?></span>
                      </p>
                      <p>
                        <i class="fas fa-bath"></i
                        ><span><?php echo $searchedItems->BHK->bath ?></span>
                      </p>

                      <p>
                        <i class="fas fa-maximize"></i
                        ><span><?php echo $searchedItems->size ?> sqft</span>
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

<!--  Form Small Devices -->
<div class="album col-lg-11 py-5 my-5 bg-body-tertiary m-auto featured-listing">
  <div class="container">
    <div class="row col-lg-12 my-2">
      <div
        class="text d-flex justify-content-between py-3 col-lg-12 col-md-6 col-sm-12"
      >
        <h2><?php echo $city ?></h2>
      </div>
    </div>
    <form action="/list" method="POST">
      <div class="new-grid snap-scroller g-3">
      <?php foreach($filteredDescriptions as $searchedItems){ ?>
        <div class="col">
          <button class="submit" value="<?php echo $searchedItems->id ?>" name="choice">
            <div class="card">
              <div class="for-sale">
                <p><?php echo $searchedItems->tag ?></p>
              </div>

              <img src="<?php echo $searchedItems->collectionImage[0] ?>" alt="" />
              <div class="card-body">
                <div class="card-text d-flex justify-content-between">
                  <h5 class="card-text"><?php echo $searchedItems->buildName ?></h5>
                  <h5><?php echo $searchedItems->price ?></h5>
                </div>
                <div class="location col-lg-11 col-md-10">
                  <p>
                    <i class="fas fa-location mx-2"></i><?php echo $searchedItems->address ?>
                  </p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group col-lg-11 col-md-10">
                    <div
                      class="d-flex py-1 col-lg-12 justify-content-between card-icons"
                    >
                      <p>
                        <i class="fas fa-bed"></i
                        ><span><?php echo $searchedItems->BHK->bed ?></span>
                      </p>
                      <p>
                        <i class="fas fa-bath"></i
                        ><span><?php echo $searchedItems->BHK->bath ?></span>
                      </p>
                      <p>
                        <i class="fas fa-maximize"></i
                        ><span><?php echo $searchedItems->size ?> sqft</span>
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

<?php include(__DIR__ . '../../partials/footermain.php');?>