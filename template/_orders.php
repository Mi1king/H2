<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-striped">
                <?php
                $sum = 0;
                $id = 0;
                $user_id = $_SESSION['user_id'];
                $query = "SELECT
                items.id, 
                items.`name`, 
                items.price, 
                items.category, 
                items.time, 
                users_items.user_id, 
                coaches.`name` AS coachName, 
                coaches.id AS coachId, 
                users_items.course_status
            FROM
                items
                INNER JOIN
                users_items
                ON 
                    items.id = users_items.item_id,
                coaches
            WHERE
                users_items.`status` = 'Confirmed' AND
                users_items.user_id = '$user_id'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                if (mysqli_num_rows($result) >= 1) {
                ?>
                    <thead>
                        <tr>
                            <th>Item Number</th>
                            <th>Item Name</th>
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
                            <td>" . "#" . $row["id"] . "</td>
                            <td> <a href='item.php?id={$row['id']}' class='thumbnail'><img src='img/" . $row["id"] . ".jpg'>" . $row["name"] . "</a></td>
                            <td> <a href='coach.php?id={$row['coachId']}'>" . $row["coachName"] . "</a></td>
                            <td>" . $row["time"] . "</td>
                            <td>Rs " . $row["price"] . "</td>";
                            if ($row["course_status"] == 'Finished') {
                                echo "<td >" . $row["course_status"] . "</td>";
                            } else {
                                echo "<td  style='color: green;'>" . $row["course_status"] . "</td>";
                            }
                            echo "
                            <td>
                            <a href='course_time_change.php?id={$row['id']}' class='btn btn-primary'>Change Time</a>
                            <a href='course.php?id={$row['id']}' class='btn btn-primary'>Start Course</a>
                            <a href='order_delete.php?id={$row['id']}' class='btn btn-primary'>Delete</a>
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