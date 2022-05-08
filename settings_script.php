<?php


// This page updates the user password
require("includes/common.php");
include 'project/project.php';

if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

$old_pass = $_POST['old-password'];
$old_pass = mysqli_real_escape_string($con, $old_pass);
//$old_pass = MD5($old_pass);

$new_pass = $_POST['password'];
$new_pass = mysqli_real_escape_string($con, $new_pass);
//$new_pass = MD5($new_pass);

$new_pass1 = $_POST['password1'];
$new_pass1 = mysqli_real_escape_string($con, $new_pass1);
//$new_pass1 = MD5($new_pass1);

$query = "SELECT email, password FROM users WHERE users.id ='" . $_SESSION['user_id'] . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);
$orig_pass = $row['password'];

if ($new_pass != $new_pass1) {
    
    echo "<script>alert('Wrong new password')</script>";
} else {
    if ($old_pass == $orig_pass) {
        $query = "UPDATE  users SET password = '" . $new_pass . "' WHERE users.id = '" . $_SESSION['user_id'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        alertf('Updated Successfully','login.php');
    } else
        alertf('Wrong old password','reset_psw.php');   
    
}

?>