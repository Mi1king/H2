<?php
require("includes/common.php");
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}

// insert to table: items
$user_id = $_SESSION['user_id'];
$name = mysqli_real_escape_string($con,  $_POST['name']);

$file = $_FILES['image'];
$ext = strrchr($file['name'], '.');
$newName = mt_rand(0000, 9999).time().$ext;
$path = 'img/'.$newName;
$info = move_uploaded_file($file['tmp_name'], $path);

$category = mysqli_real_escape_string($con,  $_POST['category']);
$price = mysqli_real_escape_string($con,  $_POST['price']);
$time = mysqli_real_escape_string($con,  $_POST['time']);


$query = "INSERT INTO `ecommerce`.`items` (`name`, `price`, `category`, `time`, `coach_id`, `image` )
VALUES
	('" . $name . "', " . $price . ", '" . $category . "', '" . $time . "' , '" . $user_id . "', '" . $path . "' );";
mysqli_query($con, $query) or die($mysqli_error($con));


header('location: products_coach.php');
