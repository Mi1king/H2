<?php
$con = mysqli_connect("150.158.45.247", "root", "123456", "ecommerce", "3306")or die(mysqli_error($con));
if(!isset($_SESSION)){
    session_start();
}

?>