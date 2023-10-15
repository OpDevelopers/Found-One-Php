<?php
include(__DIR__ . '../../array.php');
include(__DIR__. './admin.php');

// Define file paths
$filePath = $phpArray; // Update with your JSON file path
$filterPlacePath=$phpPlacesArray;
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
<div class="container col-lg-10 my-5 py-5">
  <div class="row col-lg-12 align-items-center rounded-3 border shadow-lg">
    <% describe.forEach((data)=>{ %>
    <div class="col-lg-3 p-0 overflow-hidden shadow-lg">
      <img src="<%= data.collectionImage[0] %>" alt="" width="350" />
    </div>

    <div class="row row-cols-2 col-lg-8 p-3 p-lg-5 pt-lg-3">
      <h4 class="fw-bold text-body-emphasis"></h4>
      <div class="row row-cols-2 info">
        <p class="id">Id : <%= data.id %></p>
        <p class="tag">Tag : <%= data.fandrTag %></p>
        <p class="bhk">Apartment : <%= data.apartment %></p>
        <p class="size">Size : <%= data.size %></p>
        <p class="price">Price : <%= data.price %></p>
        <p class="place">Place : <%= data.address%></p>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        
 <a href="/edit/<%=data.id%>">Edit</a>

   <button class="btn btn-danger fs-5 deleteConfirmAppear" data-id="<%=data.id%>" style="height: 3rem">
            Delete
          </button>
   
      </div>
    </div>
    <%})%>
    <div class="confirm-box">
      <p>Are you sure to delete this element ?</p>
      <button class="btn btn-primary cancle " id="cancel">Cancel</button>
      <button class="btn btn-danger delete-button" id="confirm">Confirm</button>
     </div>
  </div>
</div>


<?php include(__DIR__ . '../../partials/footermain.php');
?>