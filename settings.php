<?php
require_once("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>

<?php include 'nav.php'; ?>
<?php include './template/_account.php'; ?>
<?php /*include './template/_reset_psw.php'; */?>

<?php include("footer.php"); ?>