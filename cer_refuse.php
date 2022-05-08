<?php

require 'includes/common.php';
include 'controller/controller.php';

if (isset($_SESSION['admin_id'])) {
    $cer_id = $_GET["id"];
    refuse_certification($cer_id);
    header('location:index_admin.php?certifications');
} else {
    header('location:login_admin.php');
}
