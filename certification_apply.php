<?php
require("includes/common.php");
require_once 'project/project.php';
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}



$user_id = $_SESSION['user_id'];
$dulpi_query = "SELECT
certifications.certification_code
FROM
certifications
WHERE
certifications.user_id = '$user_id'";
$dupli_result = mysqli_query($con, $dulpi_query) or die(mysqli_error($con));
if (mysqli_num_rows($dupli_result) > 0) {
    $error = "<span class='red'>Already applied with certification code: " . mysqli_fetch_array($dupli_result)['certification_code'] . "</span>";
    // header('location: certification_apply.php?error=' . $error);
}

include 'nav.php';
include 'includes/check-if-added.php';
include './template/_certification_apply.php';
include("footer.php");
