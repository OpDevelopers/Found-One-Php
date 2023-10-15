<?php
include __DIR__ . '/../dpconfig.php';
?>
<div class="container py-4 my-4">
  <div class="box my-4">
    <div class="map-location">
      <h2>Our Location</h2>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3442.5029885993063!2d78.08096727535379!3d30.365072003308743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3908d7ab3e42c267%3A0xa0f0967f0adbd869!2sShourya%20Residency!5e0!3m2!1sen!2sin!4v1691982550825!5m2!1sen!2sin"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
    <div class="inquiry">
      <h2>Ask for Info.</h2>
      <form action="" method="POST" class="py-2" id="enquiryForm">
        <label for="fName">Full Name</label>
        <input
          type="text"
          name="name"
          id="name"
          autocapitalize="off"
          spellcheck="false"
          placeholder="Username"
          required
        />
        <label for="Contact">Phone No.</label>
        <input
          type="numeric"
          id="phone"
          name="phoneNo"
          maxlength="10"
          minlength="10"
          placeholder="012-777-090-1"
          required
        />
        <div class="count">
          <label for="Descrition">Info.</label>
          <div class="count-num"></div>
        </div>
        <textarea
          name="message"
          id="message"
          cols="50"
          rows="8"
          maxlength="250"
        ></textarea>
        <button class="btn" type="submit">Ask for Info.</button>
      </form>
    </div>
  </div>
</div>


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $phoneNo = $_POST["phoneNo"];
  $message = $_POST["message"];

  // Insert data into the database
  $sql = "INSERT INTO enquiry (name, phone, message,propertyID,propertyName) VALUES ('$name', '$phoneNo', '$message','','home')";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Thank you for submitting the enquiry. We will get back to you soon'); </script>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>