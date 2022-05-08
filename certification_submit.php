<?php
require("includes/common.php");

$user_id = $_SESSION['user_id'];
$certification_code = mysqli_real_escape_string($con, $_POST['code']);
$dulpi_query = "SELECT
certifications.id 
FROM
certifications 
WHERE
certifications.certification_code = '$certification_code'";
$dupli_result = mysqli_query($con, $dulpi_query) or die(mysqli_error($con));
if (mysqli_num_rows($dupli_result) > 0) {
    $error = "<span class='red'>You have been applied</span>";
    header('location: certification_apply.php?error=' . $error);
} else {
    $insert_query = "INSERT INTO `ecommerce`.`certifications` ( `user_id`, `certification_code`, `status` )
    VALUES
        (" . $user_id . ", '" . $certification_code . "', 'created' );";
    $insert_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    $error = "<span class='green'>You application successfully created, please wait for approve!</span>";
    header('location: certification_apply.php?error=' . $error);
}
