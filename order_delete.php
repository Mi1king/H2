<?php

require 'includes/common.php';


$item_id = $_GET["id"];
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $del_query = "DELETE FROM users_items WHERE item_id='$item_id' AND user_id='$user_id' AND status='Confirmed'";
    $res = mysqli_query($con, $del_query) or die(mysqli_error($con));
    header('location:orders.php');
} elseif (isset($_SESSION['admin_id'])) {
    $del_query = "DELETE FROM users_items WHERE id='$item_id' AND status='Confirmed'";
    $res = mysqli_query($con, $del_query) or die(mysqli_error($con));
    header('location:index_admin.php?orders');
}
