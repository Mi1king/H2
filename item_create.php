<?php
require("includes/common.php");
require_once 'project/project.php';
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>



<?php

include 'nav.php';
include './template/_item_create.php';
include("footer.php");