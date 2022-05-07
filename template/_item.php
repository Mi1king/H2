<?php
//add this item to history if not viewed before
include 'controller/history_controller.php';
$item_id = $_GET['id'];
if (check_if_in_history($item_id)) {
} else {
    add($item_id);
}
?>

<div class="container-fluid" id="content">
    <div class="row decor_bg">
    
    </div>
</div>