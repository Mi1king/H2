<?php

require 'includes/common.php';
require 'project/console.php';


$item_id=$_GET["id"];
$user_id=$_SESSION['user_id'];
console_log($user_id);
$del_query="DELETE FROM users_items WHERE item_id='$item_id' AND user_id='$user_id' AND status='Added to cart'";
$res= mysqli_query($con, $del_query) or die(mysqli_error($con));
header('location:cart.php');

?>