<?php
require 'includes/common.php';

if (isset($_SESSION['email'])) {
    header('location:index_admin.php');
}
?>

<?php
include 'nav.php';
?>

<?php
include('template/_login_admin.php');
?>


<?php
include 'footer.php';
?>