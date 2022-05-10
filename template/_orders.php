<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-striped">
                <?php
                $sum = 0;
                $id = 0;
                $user_id = $_SESSION['user_id'];
                $query = "SELECT
                tem.order_id, 
                tem.item_name, 
                tem.coach_name, 
                tem.item_id, 
                tem.time, 
                tem.price, 
                tem.category, 
                users.id AS coach_id, 
                users.`name` AS coach_name, 
                tem.course_status
            FROM
                users
                RIGHT JOIN
                items
                ON 
                    users.id = items.coach_id
                RIGHT JOIN
                (
                    SELECT
                        users_items.id AS order_id, 
                        items.`name` AS item_name, 
                        users.`name` AS coach_name, 
                        items.id AS item_id, 
                        items.time, 
                        items.price, 
                        users_items.course_status, 
                        items.category
                    FROM
                        users_items
                        LEFT JOIN
                        items
                        ON 
                            users_items.item_id = items.id
                        LEFT JOIN
                        users
                        ON 
                            items.coach_id = users.id
                    WHERE
                        users_items.`status` = 'Confirmed' AND
                        users_items.user_id = '$user_id'
                ) AS tem
                ON 
                    items.id = tem.item_id";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                if (mysqli_num_rows($result) >= 1) {
                ?>
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Course Id</th>
                            <th>Course</th>
                            <th>Coach</th>
                            <th>Time</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                            <td>" . "#" . $row["order_id"] . "</td>
                            <td>" . "#" . $row["item_id"] . "</td>
                            <td> <a href='item.php?id={$row['item_id']}' class='thumbnail'><img src='img/" . $row["item_id"] . ".jpg'";
                        ?>
                            onerror='this.src="img/sale-1149344_1920.jpg"'>
                            <?php
                            echo $row['item_name'];
                            ?>
                            </a></td>
                        <?php
                            echo "<td> <a href='coach.php?id={$row['coach_id']}'>" . $row["coach_name"] . "</a></td>
                            <td>" . $row["time"] . "</td>
                            <td>" . $row["price"] . "</td>";
                            if ($row["course_status"] == 'Finished') {
                                echo "<td >" . $row["course_status"] . "</td>";
                            } else {
                                echo "<td  style='color: green;'>" . $row["course_status"] . "</td>";
                            }
                            echo "
                            <td>
                            <a href='course_time_change.php?id={$row['item_id']}' class='btn btn-primary btn-block'>Change Time</a>
                            <a href='course.php?id={$row['item_id']}' class='btn btn-primary btn-block'>Start Course</a>
                            <a href='order_delete.php?id={$row['item_id']}' class='btn btn-primary btn-block'>Delete</a>
                            </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                <?php
                } else {
                    echo "You have no orders, go to <a href='cart.php'>buy</a> some products!";
                }
                ?>
                <?php
                ?>
            </table>
        </div>
    </div>
</div>