<?php
require("includes/common.php");
require_once 'project/project.php';
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>

<?php
include 'nav.php';
include 'includes/check-if-added.php';
?>

<?php include './template/_history.php'; ?>

<?php include("footer.php"); ?>