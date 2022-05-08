<?php

require 'includes/common.php';
if (!isset($_SESSION['admin_id'])) {
    header('location:login_admin.php');
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $del_query = "DELETE FROM users WHERE id='$id'";
    $res = mysqli_query($con, $del_query) or die(mysqli_error($con));
}
header('location:index_admin.php?users');

