<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3" style="margin-top:8.33333333%;">
            <table class="table table-striped">
                <?php
                $query = "SELECT res.id,res.`name`,IFNULL(res.num,0) AS num FROM ( SELECT
                categories.id,
                categories.`name`,
                cat_count.num 
                FROM
                    categories
                    LEFT JOIN ( SELECT items.category AS `name`, COUNT(*) AS num FROM items GROUP BY items.category ) AS cat_count ON categories.`name` = cat_count.`name` 
                ORDER BY
                categories.id ASC 
                ) AS res";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                ?>
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>Category name</th>
                        <th>Num. Products</th>
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
                            <td>" . $row["num"] . "</td>
                            <td>
                            <a href='cat_del.php?id={$row['id']}' class='btn btn-primary btn-block'>Delete</a>
                            </td>
                            </tr>";
                        }
                    }
                    echo "<tr>
                        <td></td>
                        <td>
                            <a href='creat-cat.php' class='btn btn-primary btn-block'>Create category</a>   
                        </td>
                        <td></td>
                        <td></td>
                        </tr>";
                    ?>
                </tbody>
                <?php
                ?>
            </table>
        </div>
    </div>
</div>