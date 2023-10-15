<?php

include(__DIR__ . '/../partials/head2.php');

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




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $choices = isset($_POST['productId']) ? intval($_POST['productId']) : null;

    if ($choices === null) {
        http_response_code(400); // Bad Request
        echo 'Invalid input';
        exit();
    }

    // Find the product in the included array.
    $productIndex = -1;
    foreach ($phpArray as $index => $item) {
        if (intval($item->id) === $choices) {
            $productIndex = $index;
            break;
        }
    }

    if ($productIndex === -1) {
        http_response_code(404); // Not Found
        echo 'Object not found in list';
        exit();
    }
    // Get the selected product.
    $list = $phpArray[$productIndex]; 
} else {
    http_response_code(405); // Method Not Allowed
    echo 'Method not allowed';
}
?>

<div class="container_img">
  <div class="container_descrip">
    <h1>Single Listing</h1>
    <p>Home/ Single home</p>
  </div>
</div>

<div class="house_details">
  <div class="house-image">
    <div id="carouselExample" class="carousel slide col-12">
      <div class="carousel-inner">
        <div class="carousel-item active">
            
          <img src="<?php echo $list->collectionImage[0] ?>" alt="active-image" />
        </div>

        <?php foreach($list->collectionImage as $images){ ?>
        <div class="carousel-item">
          <img src="<?php echo $images ?>" class="d-block" alt="..." />
        </div>
        <?php } ?>
      </div>

      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExample"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExample"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="house-items">
    <div class="house-heading">
      <div class="house-name">
        <h2><?php echo $list->buildName ?></h2>
        <h2><?php echo $list->price ?></h2>
      </div>
      <div class="house-BHK">
        <ul>
          <div>
            <li><i class="fa fa-bed"></i><?php echo $list->BHK->bed ?></li>
            <li><i class="fa fa-bath"></i><?php echo $list->BHK->bath ?></li>
            <li><i class="fa fa-ruler-combined"></i><?php echo $list->size ?> sqft</li>
          </div>
          <button type="button" class="btn btn-primary">Site Visit</button>
        </ul>
        <div>
          <p><i class="fa fa-location-dot fa-lg"></i> <?php echo $list->address ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="description">
  <div class="des-right">
    <div class="des-upper">
      <div>
        <h3>Property description</h3>
        <?php foreach($list->description as $data){ ?>

        <ul>
          <li><?php echo $data ?></li>
        </ul>
        <?php } ?>
      </div>
      <div class="feature">
        <h3>Amanities</h3>
        <div class="features-icons">
          <div class="icons"><i class="fa fa-fan"></i>Air Conditioned</div>
          <div class="icons"><i class="fa fa-soap"></i>Laundry</div>
          <div class="icons">
            <i class="fa-regular fa-square-check"></i>Barbeque
          </div>
          <div class="icons">
            <i class="fa-regular fa-square-check"></i>Refrigerator
          </div>
          <div class="icons">
            <i class="fa-regular fa-square-check"></i>Window
          </div>
          <div class="icons">
            <i class="fa-regular fa-square-check"></i>Grage
          </div>
          <div class="icons">
            <i class="fa-regular fa-square-check"></i>Parking
          </div>
          <div class="icons">
            <i class="fa-regular fa-square-check"></i>Fitness Gym
          </div>
          <div class="icons">
            <i class="fa-regular fa-square-check"></i>Fireplace
          </div>
          <!--<div class="icons">-->
          <!--  <i class="fa-regular fa-square-check"></i>Swimming pool-->
          <!--</div>-->
        </div>
      </div>
      <div class="my-5 videoLink">
        <iframe
        class="yVideoFrame"
          width="650"
          height="450"
          src="<?php echo $list->linkVideo ?>"
          title="YouTube video player"
          frameborder="2"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen
        ></iframe>
        <?php echo $list->linkVideo ?>
      </div>
    </div>
    <div class="des-features">
    <h3>File Inquiry</h3>

   <form action="./enquiry.php" method="POST" id="enquiryForm">
        <div class="d-flex justify-content-between">
            <input
                style="border: none;"
                type="hidden"
                name="propertyID"
                value="<?php echo isset($list->id) ? $list->id : ''; ?>"
                user-select="none"
                readonly
            />
            <input
                style="border: none;"
                type="text"
                name="propertyName"
                value="<?php echo isset($list->buildName) ? $list->buildName : ''; ?>"
                user-select="none"
                readonly
            />
        </div>

        <div>
            <label for="fName"><p>Name</p></label>
            <input type="text" class="form-control" name="name" id="full_name" aria-describedby="full_namehelpId">
        </div>

        <div>
            <label for="Contact"><p>Phone No.</p></label>
            <input type="text" class="form-control" name="phone" id="contact_number" aria-describedby="contact_numberhelpId">
        </div>
        <button type="submit" class="btn btn-1">Request Information</button>
    </form>
    <iframe src="<?php echo $list->mapLocation ?>" width="370" height="570" style="border:0; margin-top: 1rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
  </div>
</div>
</div>


<?php


include(__DIR__ . '/../partials/footermain.php');
?>




