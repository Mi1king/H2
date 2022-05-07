<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-striped">

                <!--show table only if there are items added in the cart-->
                <?php
                $id = 0;
                $user_id = $_SESSION['user_id'];
                $query = "SELECT items.price AS Price, items.id, items.name AS Name FROM users_items JOIN items ON users_items.item_id = items.id WHERE users_items.user_id='$user_id' and status='Confirmed'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                if (mysqli_num_rows($result) >= 1) {
                ?>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {

                            $id .= $row["id"] . ", ";

                            echo  "Your Order" . "<br />" . "You have already reserved a " . $row["Name"];
                        }

                        ?>
                    </tbody>
                <?php
                } else {
                    echo "No Messages";
                }
                ?>
                <?php
                ?>
            </table>
        </div>
    </div>
</div>