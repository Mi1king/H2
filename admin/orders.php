<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3" style="margin-top:8.33333333%;">
            <table class="table table-striped">
                <?php
                $query = "SELECT
                users_items.id,
                items.id AS item_id,
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
                INNER JOIN users_items ON items.id = users_items.item_id,
                coaches 
            WHERE
                users_items.`status` = 'Confirmed'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                ?>
                <thead>
                    <tr>
                        <th>Order Index</th>
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
                    if (mysqli_num_rows($result) >= 1) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                            <td>" . "#" . $row["id"] . "</td>
                            <td>" . "No." . $row["item_id"] . "</td>
                            <td> <a href='item.php?id={$row['item_id']}' class='thumbnail'><img src='img/" . $row["item_id"] . ".jpg'>" . $row["name"] . "</a></td>
                            <td> <a href='coach.php?id={$row['coachId']}'>" . $row["coachName"] . "</a></td>
                            <td>" . $row["time"] . "</td>
                            <td>" . $row["price"] . "</td>";
                            if ($row["course_status"] == 'Finished') {
                                echo "<td >" . $row["course_status"] . "</td>";
                            } else {
                                echo "<td  style='color: green;'>" . $row["course_status"] . "</td>";
                            }
                            echo "
                            <td>
                            <a href='order_delete.php?id={$row['id']}' class='btn btn-primary btn-block'>Delete</a>
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