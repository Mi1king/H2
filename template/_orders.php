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
                users_items.course_status
            FROM
                users_items
                INNER JOIN
                items
                ON 
                    users_items.item_id = items.id
            WHERE
                users_items.`status` = 'Confirmed' AND
                users_items.user_id = '$user_id'";
                // $query = "SELECT items.price AS Price, items.id, items.name AS Name FROM users_items JOIN items ON users_items.item_id = items.id WHERE users_items.user_id='$user_id' and status='Added to cart'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                if (mysqli_num_rows($result) >= 1) {
                ?>
                    <thead>
                        <tr>
                            <th>Item Number</th>
                            <th>Item Name</th>
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
                            <td>" . $row["name"] . "</td>
                            <td>Rs " . $row["price"] . "</td>
                            <td>" . $row["course_status"] . "</td>
                            <td>
                            <a href='course_time_change.php?id={$row['id']}' class='btn btn-primary'>Change Time</a>
                            <a href='course.php?id={$row['id']}' class='btn btn-primary'>Start Course</a>
                            </td>
                            </tr>";
                        }
                        // $id = rtrim($id, ", ");
                        // echo "<tr><td></td><td>Total</td><td>Rs " . $sum . "</td><td><a href='success.php?itemsid=" . $id . "' class='btn btn-primary'>Confirm Order</a></td></tr>";
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