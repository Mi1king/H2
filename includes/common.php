<?php
require_once 'project/db.php';
$con = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DBNAME, DB_PORT) or die(mysqli_error($con));
if(!isset($_SESSION)){
    session_start();
}

?>