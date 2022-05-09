<?php
require("includes/common.php");
require_once 'project/project.php';
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>



<?php

$user_id = $_SESSION['user_id'];
$query = "SELECT
users.is_coach
FROM
users
WHERE
users.id = '$user_id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
if (!(mysqli_fetch_array($result)['is_coach'] == '1')) {
    include 'certification_apply.php';
} else {
    include 'nav.php';
    include './template/_products_coach.php';
    include("footer.php");
}
