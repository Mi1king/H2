<?php
require("includes/common.php");

$name = $_POST['name'];
$name = mysqli_real_escape_string($con, $name);
$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
$query = "SELECT id, 'name' FROM admins WHERE name='" . $name . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
if ($num == 0) {
  $error = "<span class='red'>Invalid login, please try again</span>";
  header('location: login_admin.php?error=' . $error);
} else {  
  $row = mysqli_fetch_array($result);
  $_SESSION['admin_name'] = $row['name'];
  $_SESSION['admin_id'] = $row['id'];
  header('location: index_admin.php');
}
?>