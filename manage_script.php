<?php
require("includes/common.php");
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}

// get the orginal data
$user_id = $_SESSION['user_id'];
$query = "SELECT
users.`name`,
users.email,
users.contact,
users.city,
users.address 
FROM
users 
WHERE
users.id = '$user_id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);


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


$user_id =$_SESSION['user_id'] ;




$query = "UPDATE  users SET name = '" . $new_name . "',
email = '" . $new_email . "',
contact = '" . $new_contact . "' ,
city = '" . $new_city . "' ,
address = '" . $new_address . "'
WHERE users.id = '" .$user_id  . "'";
mysqli_query($con, $query) or die($mysqli_error($con));

$_SESSION['email'] = $new_email;

header('location: settings.php');
