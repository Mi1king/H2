<?php
//add this item to history if not viewed before
include 'controller/history_controller.php';
$item_id = $_GET['id'];
if (check_if_in_history($item_id)) {
} else {
    add($item_id);
}
?>

<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-striped">
                <?php
                $query = "SELECT
                items.id, 
                items.`name`, 
                items.`image`, 
                items.price, 
                items.category, 
                items.time, 
                users.`name` AS coach_name, 
                users.email AS coach_email
            FROM
                items
                INNER JOIN
                users
                ON 
                    items.coach_id = users.id
            WHERE
                items.id = $item_id";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                if (mysqli_num_rows($result) >= 1) {
                ?>
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Time</th>
                            <th>Coach</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // item details
                        while ($row = mysqli_fetch_array($result)) {
                            $id .= $row["id"] . ", ";
                            echo "<tr>
                            <td> " . $row["name"] . "</td>
                            <td> " . $row["category"] . "</td>
                            <td> <a href='item.php?id={$row['id']}' class='thumbnail'><img src='" . $row["image"] . ".jpg'";
                        ?>
                        onerror='this.src="img/sale-1149344_1920.jpg"'>
                            <?php
                            echo $row['name'];
                            ?>
                            </a></td>
                        <?php
                            echo "<td>" . $row["price"] . "</td>
                            <td>" . $row["time"] . "</td>
                            <td> 
                             <li class='list-group-item'>User Name:" . $row["coach_name"] . "</li>
                             <li class='list-group-item'>Email:" . $row["coach_email"] . "</li>
                            </td>
                            </tr>";
                        }

                        //add to cart
                        echo "<tr>
                        <td></td>
                        <td></td>
                        <td>";
                        if (check_if_added_to_cart($item_id)) {
                            echo '<a href="#" class="btn btn-success btn-block" disabled>Added to Cart</a>';
                        } else {

                            echo '<p> <a href="cart_add.php?id=' . $item_id . '" class="btn btn-primary btn-block" name="add" value="add">Add to cart</a></p>';
                        }
                        echo "</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>";

                        //back to products page
                        echo "<tr>
                        <td></td>
                        <td></td>
                        <td>";
                        echo '<a href="products.php" class="btn btn-primary btn-block">Back</a>';
                        echo "</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>";
                        ?>
                    </tbody>
                <?php
                } else {
                    header('location:products.php');
                }
                ?>
                <?php
                ?>
            </table>
        </div>
    </div>
</div>