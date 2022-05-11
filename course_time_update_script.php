<?php
require 'includes/common.php';

$item_id = $_POST["item_id"];
$course_time = $_POST["course_time"];
$query = "UPDATE `ecommerce`.`items` 
SET 
`time` =  '" . $course_time . "'
WHERE
	`id` = '$item_id';";
$res = mysqli_query($con, $query) or die(mysqli_error($con));
header('location:orders.php');
