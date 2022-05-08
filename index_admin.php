<?php
require("includes/common.php");
require_once 'project/project.php';
if (!isset($_SESSION['admin_name'])) {
    header('location: login_admin.php');
}
?>

<?php
include 'head.php';
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
                }
                ?>
            </div>
        </div>
    </div>
</div><!-- wrapper finish -->



<?php include("footer.php"); ?>