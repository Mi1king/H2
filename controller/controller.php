<?php
function approve_certification($cer_id)
{
    require("includes/common.php");

    // get user_id by known cer_id
    $query = "SELECT
	certifications.user_id 
FROM
	certifications 
WHERE
	certifications.id = $cer_id";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_fetch_array($result)['user_id'];


    // update the certification status to be 'completed'
    $query = "UPDATE `ecommerce`.`certifications` 
    SET `status` = 'completed' 
    WHERE
        `id` = '$cer_id';";
    mysqli_query($con, $query) or die(mysqli_error($con));



    // update the user to be a coach
    $query = "UPDATE `ecommerce`.`users` 
        SET `is_coach` = '1' 
        WHERE
            `id` = '$user_id';";
    mysqli_query($con, $query) or die(mysqli_error($con));
}

function refuse_certification($cer_id)
{
    require("includes/common.php");
    // delete this certification
    $query = "DELETE 
    FROM
        `ecommerce`.`certifications` 
    WHERE
        `id` = '$cer_id';";
    mysqli_query($con, $query) or die(mysqli_error($con));
}

function item_create($name)
{
    require("includes/common.php");
    // delete this certification
    $query = "DELETE 
    FROM
        `ecommerce`.`certifications` 
    WHERE
        `id` = '$cer_id';";
    mysqli_query($con, $query) or die(mysqli_error($con));
}
