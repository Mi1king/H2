<?php
require 'includes/common.php';
?>

<?php
include 'nav.php';
include 'includes/check-if-added.php';
?>

<?php

if (!isset($_SESSION['email'])) {
    header('location:login.php');
} else {
    $id = $_GET['id'];
    include("./template/_item.php");
}
?>

<?php include("footer.php"); ?>