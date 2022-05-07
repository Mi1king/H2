<?php
require("includes/common.php");
require_once 'project/project.php';
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>

<?php include 'nav.php'; ?>

<?php include './template/_orders.php'; ?>

<?php include("footer.php"); ?>