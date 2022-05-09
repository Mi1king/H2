<?php

require 'includes/common.php';

$item_id = $_GET["id"];
$del_query = "DELETE FROM items WHERE id='$item_id'";
$res = mysqli_query($con, $del_query) or die(mysqli_error($con));
if (isset($_SESSION['user_id'])) {
    $pre_page = $_GET["pre_page"];
    header('location:' . $pre_page);
} elseif (isset($_SESSION['admin_id'])) {
    header('location:index_admin.php?products');
}
