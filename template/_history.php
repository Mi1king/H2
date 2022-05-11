<?php
// require_once "./project/console.php";
?>
<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-striped">
                <?php
                $user_id = $_SESSION['user_id'];
                $query = "SELECT
                items.id, 
                items.`name`, 
                items.`image`, 
                items.price
            FROM
                item_history
                LEFT JOIN
                items
                ON 
                    item_history.item_id = items.id
            WHERE
                item_history.user_id = '$user_id'
            ORDER BY
                item_history.id DESC";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                // console_log(mysqli_num_rows($result));
                if (mysqli_num_rows($result) >= 1) {
                ?>
                    <thead>
                        <tr>
                            <th>Item Number</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                            <td>" . "#" . $row["id"] . "</td>
                            <td> <a href='item.php?id={$row['id']}' class='thumbnail'><img src='" . $row["image"] . "'";
                        ?>
                        onerror='this.src="img/sale-1149344_1920.jpg"'>
                            <?php
                            echo $row['name'];
                            ?>
                            </a></td>
                        <?php
                            echo "<td>" . $row["price"] . "</td>
                            <td>";
                            //  action
                            if (check_if_added_to_cart($row["id"])) {
                                echo '<a href="#" class="btn btn-success btn-block" disabled>Added to Cart</a>';
                            } else {
    
                                echo '<p> <a href="cart_add.php?id='. $row["id"] . '" class="btn btn-primary btn-block" name="add" value="add">Add to cart</a></p>';
                            }
                            echo "
                            <a href='history_delete.php?id={$row['id']}' class='btn btn-primary btn-block'>Delete</a>
                            </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                <?php
                } else {
                    echo "You have no browsing records, go to <a href='cart.php'>find</a> some products!";
                }
                ?>
                <?php
                ?>
            </table>
        </div>
    </div>
</div>