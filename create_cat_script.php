<?php
require("includes/common.php");
require_once 'project/project.php';
if (!isset($_SESSION['admin_name'])) {
    header('location: login_admin.php');
}
?>
<?php
$cat = $_POST['category'];
$category = mysqli_real_escape_string($con, $cat);
$Create = "INSERT INTO `ecommerce`.`categories` (`name`) VALUES ('$category')";
$after_create = mysqli_query($con, $Create) or die(mysqli_error($con));
header('location: index_admin.php?cat');
?>


