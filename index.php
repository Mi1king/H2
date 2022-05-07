<?php
require 'project/project.php';
require 'includes/common.php';

if (isset($_SESSION['email'])) {
    header('location:products.php');
}
?>
<!-- <html lang="en">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome | Health Hour</title>
        <link href="CSS/bootstrap.css" rel="stylesheet">
        <link href="CSS/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
<body style="padding-top:50px;"> -->
<?php
include 'nav.php';
?>
<?php
include './template/_index.php';
?>
<?php
include 'footer.php';
?>