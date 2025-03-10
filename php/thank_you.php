
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      body{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
      }
    </style>
</head>
<body>

    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5 text-center">
          <h1 class="display-5 fw-bold">Thank You</h1>
          <p class="col-lg-12 col-md-8 fs-4">Our Team will get back to you soon.</p>
          <a href="/">Go back</a>
        </div>
      </div>
      
      
<?php
echo $name;
echo $phoneNo;
echo $propertyID;
echo $propertyName;
?>

    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>