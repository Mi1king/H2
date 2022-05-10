<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-striped">
                <?php
                $user_id = $_SESSION['user_id'];
                $query = "SELECT
                tem.order_id, 
                tem.item_name, 
                tem.coach_name, 
                tem.coach_email, 
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
                        users.`email` AS coach_email, 
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
                            ?>
                            <td>
                                <li class='list-group-item'>User Name: <?php
                                                                        echo $row['coach_name'] ?></li>
                                <li class='list-group-item'>Email: <?php
                                                                    echo $row['coach_email'] ?></li>
                            </td>
                            <td><?php
                                echo $row['time'] ?></td>
                            <td><?php
                                echo $row['price'] ?></td>
                            <?php
                            if ($row["course_status"] == 'Finished') {
                            ?>
                                <td><?php
                                    echo $row["course_status"] ?></td>
                            <?php
                            } else {
                            ?>
                                <td style='color: green;'>
                                    <?php
                                    echo $row["course_status"] ?></td>

                                <td>
                                    <a class='btn btn-primary btn-block'>Change Time</a>
                                    <a href='course.php?id=<?php
                                                            echo $row['item_id'] ?>' class='btn btn-primary btn-block'>Start Course</a>
                                    <a href='order_delete.php?id=<?php
                                                                    echo $row['item_id'] ?>' class='btn btn-primary btn-block'>Delete</a>
                                </td>
                                </tr>
                        <?php
                            }
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