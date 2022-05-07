<?php
require 'includes/common.php';
?>

<?php
include 'nav.php';
include 'includes/check-if-added.php';
?>

<?php 
$id=$_GET['id'];
include("./template/_item.php");

?>

<?php include("footer.php"); ?>