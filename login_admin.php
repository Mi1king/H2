<?php
require 'includes/common.php';

if (isset($_SESSION['email'])) {
    header('location:management.php');
}
?>

<?php
include 'nav_admin.php';
?>

<?php
include('template/_login_admin.php');
?>


<?php
include 'footer.php';
?>