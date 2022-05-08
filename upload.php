<?php
require_once("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
$user_id = $_SESSION['user_id'];
$file = $_FILES['image'];
$ext = strrchr($file['name'], '.');
$newName = mt_rand(0000, 9999).time().$ext;
$path = 'img/'.$newName;
$info = move_uploaded_file($file['tmp_name'], $path);

require("includes/common.php");
$query = "UPDATE  users SET photo = '$path' WHERE users.id = '$user_id'";
        mysqli_query($con, $query) or die($mysqli_error($con));
$a = "SELECT users.photo AS PHOTO FROM users WHERE users.id = $user_id";
$b = mysqli_query($con, $a)or die(mysqli_error($con));
$row = mysqli_fetch_array($b);

header('location: settings.php');
    ?>