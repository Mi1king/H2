<?php

// This page updates the user password
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

$new_name = $_POST['new-name'];
$new_name = mysqli_real_escape_string($con, $new_name);
$new_contact = $_POST['new-contact'];
$new_contact = mysqli_real_escape_string($con, $new_contact);
$new_email = $_POST['new-email'];
$new_email = mysqli_real_escape_string($con, $new_email);
$new_city = $_POST['new-city'];
$new_city = mysqli_real_escape_string($con, $new_city);
$new_address = $_POST['new-address'];
$new_address = mysqli_real_escape_string($con, $new_address);






$query = "UPDATE  users SET name = '" . $new_name . "' 
WHERE users.id = '" . $_SESSION['user_id'] . "'";
mysqli_query($con, $query) or die($mysqli_error($con));

$query2 = "UPDATE  users SET email = '" . $new_email . "' 
WHERE users.id = '" . $_SESSION['user_id'] . "'";
mysqli_query($con, $query2) or die($mysqli_error($con));

$query3 = "UPDATE  users SET contact = '" . $new_contact . "' 
WHERE users.id = '" . $_SESSION['user_id'] . "'";
mysqli_query($con, $query3) or die($mysqli_error($con));

$query4 = "UPDATE  users SET city = '" . $new_city . "' 
WHERE users.id = '" . $_SESSION['user_id'] . "'";
mysqli_query($con, $query4) or die($mysqli_error($con));

$query5 = "UPDATE  users SET address = '" . $new_address . "' 
WHERE users.id = '" . $_SESSION['user_id'] . "'";
mysqli_query($con, $query5) or die($mysqli_error($con));

header('location: settings.php');
        
    
?>