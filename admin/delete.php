<?php
session_start();

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION["admin_username"])) {
    header("Location: admin.php");
    exit();
}

include '../dpconfig.php';

if (isset($_GET['id'])) {
    $delete_id = $_GET['id'];
    $sql = "SELECT * FROM data WHERE `id`='$delete_id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Unsuccessful: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
}

// Check if the user has confirmed the deletion
if (isset($_POST['confirm_delete'])) {
    $sql = "DELETE FROM data WHERE `id`='$delete_id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Unsuccessful: " . mysqli_error($conn));
    }

    header("Location: ./viewListing.php");
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Confirmation</title>
</head>
<body>
    <?php if (isset($row)) : ?>
    <h2>Confirm Deletion</h2>
    <p>Are you sure you want to delete the record with ID: <?php echo $row['id']; ?>?</p>
    <form method="POST">
        <input type="submit" name="confirm_delete" value="Confirm">
        <a href="./viewListing.php">Cancel</a>
    </form>
    <?php else : ?>
    <p>Record not found.</p>
    <?php endif; ?>
</body>
</html>
