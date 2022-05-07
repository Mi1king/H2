<?php
require 'includes/common.php';

if (isset($_SESSION['email'])) {
    header('location:products.php');
}
?>

<?php
include 'nav.php';
?>

<?php
include('./template/_login.php');
?>


<?php
include 'footer.php';
?>