<?php
// auth.php
session_start();

function checkAuthentication() {
    if (!isset($_SESSION["adminName"])) {
        header("Location: ./index.php"); // Redirect unauthorized users to the login page
        exit();
    }
}

?>