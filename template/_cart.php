<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-striped">
                <!--show table only if there are items added in the cart-->
                <?php
                $sum = 0;
                $id = 0;
                $user_id = $_SESSION['user_id'];
                $query = "SELECT items.price AS Price, items.id, items.name, items.image AS Name FROM users_items JOIN items ON users_items.item_id = items.id WHERE users_items.user_id='$user_id' and status='Added to cart'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                if (mysqli_num_rows($result) >= 1) {
                ?>
                    <thead>
                        <tr>
                            <th>Item Number</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $sum += $row["Price"];
                            $id .= $row["id"] . ", ";
                            echo "<tr>
                            <td>" . "#" . $row["id"] . "</td>
                            <td> <a href='item.php?id={$row['id']}' class='thumbnail'><img src='" . $row["image"] . "'";
                        ?>
                        onerror='this.src="img/sale-1149344_1920.jpg"'>
                            <?php
                            echo $row['Name'];
                            ?>
                            </a></td>
                        <?php
                            echo "<td>" . $row["Price"] . "</td>
                            <td>
                            <a href='cart_remove.php?id={$row['id']}' class='btn btn-primary btn-block'> Remove</a>
                            </td>
                            </tr>";
                        }
                        $id = rtrim($id, ", ");
                        echo "<tr>
                        <td></td>
                        <td>Total</td>
                        <td>" . $sum . "</td>
                        <td>
                        <a href='success.php?itemsid=" . $id . "' class='btn btn-primary btn-block'>Create Order</a>
                        </td>
                        </tr>";
                        ?>
                    </tbody>
                <?php
                } else {
                    echo "There is no product, go to <a href='products.php'>find</a> your health!";
                }
                ?>
                <?php
                ?>
            </table>
        </div>
    </div>
</div>