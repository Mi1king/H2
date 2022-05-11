<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3" style="margin-top:8.33333333%;">
            <table class="table table-striped">
                <?php
                $query = "SELECT
                items.id, 
                items.`name`, 
                items.image, 
                items.price, 
                items.category, 
                items.time, 
                users.`name` AS coach
            FROM
                items
                INNER JOIN
                users
                ON 
                    items.coach_id = users.id";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                ?>
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>Name</th>
                        <th>Picture</th>
                        <th>Coach</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Time</th>
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
                            <td>" . $row["name"] . "</td>
                            <td> <a class='thumbnail'><img src='" . $row["image"] . "'";
                    ?>
                            onerror='this.src="img/sale-no-image.jpg"'>
                            </a></td><?php echo "
                            <td>" . $row["coach"] . "</td>
                            <td>" . $row["price"] . "</td>
                            <td>" . $row["category"] . "</td>
                            <td>" . $row["time"] . "</td>
                            
                            <td>
                                <a href='item_del.php?id={$row['id']}' class='btn btn-primary btn-block'>Delete</a>
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