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
