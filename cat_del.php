<?php
require("includes/common.php");
require_once 'project/project.php';
if (!isset($_SESSION['admin_name'])) {
    header('location: login_admin.php');
}
?>
<?php
 
 $id =  $_REQUEST['id']; ;
$DELETE = "DELETE FROM categories WHERE categories.id = '$id'";
$res = mysqli_query($con, $DELETE) or die(mysqli_error($con));
header('location: index_admin.php?cat');
?>