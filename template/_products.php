<div class="container" id="content">

    <!-- Jumbotron Header -->
    <div class="jumbotron home-spacer" id="products-jumbotron">
        <h1>Welcome to Health Hour!</h1>
        <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>

    </div>
    <hr>

    <?php
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
        items.`name`
    FROM
        items
    WHERE
        category = '".$category["category"]."'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            if (mysqli_num_rows($result) >= 1) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='col-md-3 col-sm-6 home-feature'>
                    <div class='thumbnail'>
                    <a href='item.php?id={$row['id']}'><img src='img/" . $row['id'] . ".jpg'></a>
                        <div class='caption'>
                            <h3> " . $row["name"] . "</h3>
                            <p>Price: Rs." . $row["price"] . " </p>";
                    if (!isset($_SESSION['email'])) {
                        echo '<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>';
                    } else {
                        if (check_if_added_to_cart($row["id"])) {
                            echo '<a href="#" class="btn btn-success btn-block" disabled>Added to Cart</a>';
                        } else {

                            echo '<p> <a href="cart_add.php?id='. $row["id"] . '" class="btn btn-primary btn-block" name="add" value="add">Add to cart</a></p>';
                        }
                    }
                    echo '
                        </div>
                    </div>
                </div>';
                }
            } else {
                echo "There are no items at the moment. Please look forward to it!";
            }
        }
    } else {
        echo "There are no items at the moment. Please look forward to it!";
    }
    ?>
    <hr>
</div>