<?php
require_once("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>

<?php include 'nav.php'; ?>
<?php include './template/_manage.php'; ?>

<?php include("footer.php"); ?>