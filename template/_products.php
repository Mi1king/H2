<div class="container" id="content">

    <!-- Jumbotron Header -->
    <div class="jumbotron home-spacer" id="products-jumbotron">
        <h1>Welcome to Health Hour!</h1>
    </div>
    <hr>

    <?php
    if (isset($_GET['cat'])) { // select a cat
        $cat = $_GET['cat'];
        $query = "SELECT
                            items.id, 
                            items.price, 
                            items.image, 
                            items.`name`
                        FROM
                            items
                        WHERE
                            category = '" . $cat . "'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        if (mysqli_num_rows($result) >= 1) {
            $item_counter = 0;
            while ($row = mysqli_fetch_array($result)) {
    ?>
                <div class='col-md-3 col-sm-6 home-feature'>
                    <div class='thumbnail'>
                        <?php
                        echo " <a href='item.php?id={$row['id']}' class='thumbnail'><img src='" . $row["image"] . ".jpg'";
                        ?>
                        onerror='this.src="img/sale-1149344_1920.jpg"'>
                        <?php
                        echo $row['name'];
                        ?>
                        </a>
                        <div class='caption'>
                            <h3> <?php echo $row['name']; ?></h3>
                            <p>Price:<?php echo $row['price']; ?></p>
                            <?php
                            if (!isset($_SESSION['email'])) {
                                echo '<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>';
                            } else {
                                if (check_if_added_to_cart($row["id"])) {
                            ?>
                                    <a href="#" class="btn btn-success btn-block" disabled>Added to Cart</a>
                                <?php
                                } else {
                                ?>
                                    <p> <a href="cart_add.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-block" name="add" value="add">Add to cart</a></p>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            header('location:products.php');
        }
    } else { // no cat select
        $category_query = 'SELECT
                            items.category
                        FROM
                            items
                        GROUP BY
                            items.category';
        $category_result = mysqli_query($con, $category_query) or die(mysqli_error($con));
        if (mysqli_num_rows($category_result) >= 1) {
            while ($category = mysqli_fetch_array($category_result)) {
                echo '<div class="row text-center" id="' . $category["category"] . '">
            <h3>' . $category["category"] . '</h3>';

                $query = "SELECT
                            items.id, 
                            items.price, 
                            items.image, 
                            items.`name`
                        FROM
                            items
                        WHERE
                            category = '" . $category["category"] . "'
                        LIMIT 3";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                if (mysqli_num_rows($result) >= 1) {
                    $item_counter = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $item_counter += 1;
                        echo "<div class='col-md-3 col-sm-6 home-feature'>
                    <div class='thumbnail'>
                    <a href='item.php?id={$row['id']}' class='thumbnail'><img src='" . $row["image"] . ".jpg'";
                ?>
                        onerror='this.src="img/sale-1149344_1920.jpg"'>
                        <?php
                        echo $row['name'];
                        ?>
                        </a>
                        <?php
                        echo "<div class='caption'>
                            <h3> " . $row["name"] . "</h3>
                            <p>Price:" . $row["price"] . " </p>";
                        if (!isset($_SESSION['email'])) {
                            echo '<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>';
                        } else {
                            if (check_if_added_to_cart($row["id"])) {
                                echo '<a href="#" class="btn btn-success btn-block" disabled>Added to Cart</a>';
                            } else {

                                echo '<p> <a href="cart_add.php?id=' . $row["id"] . '" class="btn btn-primary btn-block" name="add" value="add">Add to cart</a></p>';
                            }
                        }
                        echo '
                        </div>
                    </div>
                </div>';
                    }
                    if ($item_counter = 3) {  ?>
                        <div class=' col-md-3 col-sm-6 home-feature'>
                            <a href=<?php
                                    echo "'products.php?cat={$category['category']}'";
                                    ?>> <i class="glyphicon glyphicon-menu-right"></i> Find more
                            </a>
                        </div>
    <?php
                    }
                } else {
                    echo "There are no items at the moment. Please look forward to it!";
                }
            }
        } else {
            echo "There are no items at the moment. Please look forward to it!";
        }
    }
    ?>
    <hr>
</div>