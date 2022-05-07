<?php
function add($item_id)
{
    require("includes/common.php");
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $item_id = $_GET['id'];
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO item_history(user_id, item_id) VALUES('$user_id', '$item_id')";
        mysqli_query($con, $query) or die(mysqli_error($con));
    }
}
