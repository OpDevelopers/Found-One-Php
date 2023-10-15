 <?php
$servername="localhost";
$username="u115488740_fOne";
$password="ArtF0Und0ne@1122";
$dbname="u115488740_artFOne";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

$_request=$_SERVER["REQUEST_URI"];


$sql = "SELECT * FROM data";
$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Query failed: " . mysqli_error($conn));
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
    <style>
        .navbar{
            top:0px;
        }
    </style>
  </head>
  <body>

<main class="form-signin my-5 py-5 w-25 m-auto">
  <form action="/admin/admin.php" method="post" class="text-center">
    <img
      class="my-5 m-auto"
      src="/images/foundOne.svg"
      alt=""
      width="100"
      height="100"
    />
    <h1 class="h3 mb-3 fs-3 fw-normal">Admin Login</h1>

    <div class="form-floating my-1">
      <input
        type="text"
        class="form-control"
        id="floatingInput"
        name="adminName"
        placeholder="Username"
      />
      <label for="Admin Username">Admin Username</label>
    </div>
    <div class="form-floating my-1">
      <input
        type="password"
        class="form-control"
        id="floatingPassword"
        name="adminPass"
        placeholder="Password"
      />
      <label for="floatingPassword">Admin Password</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
    <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
  </form>
</main>

<?php include(__DIR__ . '../../partials/footermain.php');
?>
