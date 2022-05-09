<?php
require("includes/common.php");
require_once 'project/project.php';
if (!isset($_SESSION['admin_name'])) {
    header('location: login_admin.php');
}
?>

<?php
include 'head-admin.php';
?>

<div id="wrapper">
    <!-- #wrapper begin -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-lg-2">
                <?php include("nav_admin.php"); ?>
                <!-- include the nav part in frame.php -->
            </div>
            <div class="col-sm-9 col-lg-10">
                <?php
                if (isset($_GET['orders'])) {
                    include("admin/orders.php");
                }elseif (isset($_GET['products'])) {
                    include("admin/products.php");
                }elseif (isset($_GET['users'])) {
                    include("admin/users.php");
                }elseif (isset($_GET['certifications'])) {
                    include("admin/certifications.php");
                }else{
                    include("admin/cat.php");
                }
                ?>
            </div>
        </div>
    </div>
</div><!-- wrapper finish -->



<?php include("footer.php"); ?>