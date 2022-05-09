<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3" style="margin-top:8.33333333%;">
            <table class="table table-striped">
                <?php
                $query = "SELECT
                tem.order_id, 
                tem.item_name, 
                tem.coach_name, 
                tem.id AS item_id, 
                users.`name` AS student_name, 
                tem.time, 
                tem.price, 
                tem.course_status
            FROM
                users
                RIGHT JOIN
                (
                    SELECT
                        users_items.id AS order_id, 
                        items.`name` AS item_name, 
                        users.`name` AS coach_name, 
                        items.id, 
                        items.time, 
                        items.price, 
                        users_items.course_status, 
                        users_items.user_id AS student_id
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
                        users_items.`status` = 'Confirmed'
                ) AS tem
                ON 
                    users.id = tem.student_id";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                ?>
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Coach Name</th>
                        <th>Student Name</th>
                        <th>Time</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) >= 1) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                            <td>" . "#" . $row["order_id"] . "</td>
                            <td>" . "No." . $row["item_id"] . "</td>
                            <td>" . $row["item_name"] . "</td>
                            <td>" . $row["coach_name"] . "</td>
                            <td>" . $row["student_name"] . "</td>
                            <td>" . $row["time"] . "</td>
                            <td>" . $row["price"] . "</td>";
                            if ($row["course_status"] == 'Finished') {
                                echo "<td >" . $row["course_status"] . "</td>";
                            } else {
                                echo "<td  style='color: green;'>" . $row["course_status"] . "</td>";
                            }
                            echo "
                            <td>
                            <a href='order_delete.php?id={$row['order_id']}' class='btn btn-primary btn-block'>Delete</a>
                            </td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
                <?php
                ?>
            </table>
        </div>
    </div>
</div>