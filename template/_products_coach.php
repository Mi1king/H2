<?php
if (isset($_GET['sold'])) {
    $sold = $_GET['sold'];
} else {
    $sold = 'unsold';
}
?>

<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3">
            <div>
                <a href='products_coach.php?sold=<?php
                                                    echo ($sold == 'sold') ? 'unsold' : 'sold';
                                                    ?>' class='btn btn-primary btn-block'><i class='glyphicon glyphicon-retweet'></i> Unsold/Sold</a>
            </div><br><br>

            <?php
            if ($sold == 'sold') { // show all sold products

            ?>
                <table class="table table-striped">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT
                    items.id AS item_id, 
                    items.`name` AS items_name, 
                    items.category, 
                    items.price, 
                    items.time, 
                    items.image AS items_image, 
                    users_items.course_status, 
                    users.`name` AS coach_name, 
                    users.email AS coach_email
                FROM
                    items
                    LEFT JOIN
                    users_items
                    ON 
                        items.id = users_items.item_id
                    LEFT JOIN
                    users
                    ON 
                        users_items.user_id = users.id
                WHERE
                    items.coach_id = '$user_id'AND
                    users_items.`status` = 'Confirmed'
                ORDER BY
                    item_id DESC";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));

                    ?>
                    <thead>
                        <tr>
                            <th>Product Index</th>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>User Info</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) >= 1) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>
                            <td>" . "#" . $row["item_id"] . "</td>
                            <td>" . $row["items_name"] . "</td>
                            <td> <a href='item.php?id={$row['item_id']}' class='thumbnail'><img src='" . $row["items_image"] . "'";
                        ?>
                                onerror='this.src="img/sale-no-image.jpg"'>
                                </a></td><?php echo "
                            <td>" . $row["category"] . "</td>
                            <td>" . $row["price"] . "</td>";

                                            ?>
                                <td>

                                    <form action="course_time_update_script.php" method="post">
                                        <input value=<?php echo $row['time'] ?> name="course_time" /><br><br>
                                        <input type="hidden" value=<?php echo $row['item_id'] ?> name="item_id" style="none" />
                                        <input type="submit" class="btn btn-primary btn-block" value="Change time">
                                    </form>
                                </td>
                            <?php
                                echo "
                            <td>" . $row["course_status"] . "</td>
                            <td>
                                <li class='list-group-item'>User Name:" . $row["coach_name"] . "</li>
					            <li class='list-group-item'>Email:" . $row["coach_email"] . "</li>
                            </td>
                          
                            <td>
                            <a href='course.php?id={$row['item_id']}' class='btn btn-primary btn-block'>Start Course</a>
                            </td>
                            </tr>";
                            }
                            ?>
                    </tbody>
                <?php
                        }
                ?>
                </table>
            <?php
            } else { // show all unsold products
            ?>
                <table class="table table-striped">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT
                    items.id, 
                    items.`name`, 
                    items.price, 
                    items.category, 
                    items.time,
                    items.image AS items_image
                FROM
                    items
                    LEFT JOIN
                    users_items
                    ON 
                        items.id = users_items.item_id
                WHERE
                    items.coach_id = '$user_id' AND
                    (
                        users_items.`status` IS NULL OR
                        users_items.`status` <> 'Confirmed'
                    )
                ORDER BY
                    id DESC";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));

                    ?>
                    <thead>
                        <tr>
                            <th>Product Index</th>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) >= 1) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>
                            <td>" . "#" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td> <a href='item.php?id={$row['id']}' class='thumbnail'><img src='" . $row["items_image"] . "'";
                        ?>
                                onerror='this.src="img/sale-no-image.jpg"'>
                                </a></td><?php echo "
                            <td>" . $row["category"] . "</td>
                            <td>" . $row["price"] . "</td>
                            <td>" . $row["time"] . "</td>
                            <td>
                            <a href='item_del.php?id={$row['id']}&pre_page=products_coach.php' class='btn btn-primary btn-block'>Delete</a>
                            </td>
                            </tr>";
                                        }
                                            ?>
                    </tbody>
                <?php
                        }
                ?>
                </table>
                <div>
                    <a href='item_create.php' class='btn btn-primary btn-block'>Create Product</a>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</div>