<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-striped">
                <?php
                $user_id = $_SESSION['user_id'];
                $query = "SELECT
                users_items.item_id, 
                users_items.`status`, 
                users_items.course_status, 
                users.`name`, 
                users.email, 
                items.`name` AS 'items_name', 
                items.price, 
                items.category, 
                items.time
            FROM
                users_items
                INNER JOIN
                users
                ON 
                    users_items.user_id = users.id
                INNER JOIN
                items
                ON 
                    users_items.item_id = items.id
            WHERE
                users_items.item_id IN ((
                SELECT
                    users_items.item_id 
                FROM
                    users_items 
                WHERE
                    users_items.user_id = '$user_id' 
                AND users_items.teach = '1' 
                ))";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));

                ?>
                <thead>
                    <tr>
                        <th>Product Index</th>
                        <th>Product Name</th>
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
                            <td>" . $row["category"] . "</td>
                            <td>" . $row["price"] . "</td>
                            <td>" . $row["time"] . "</td>
                            <td>" . $row["course_status"] . "</td>
                            <td>
                                <li class='list-group-item'>User Name:" . $row["name"] . "</li>
					            <li class='list-group-item'>Email:" . $row["email"] . "</li>
                            </td>
                          
                            <td>
                            <a href='course_time_change.php?id={$row['item_id']}' class='btn btn-primary btn-block'>Change Time</a>
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
            <div>
                <a href='item_create.php' class='btn btn-primary btn-block'>Create Product</a>
            </div>
        </div>
    </div>
</div>