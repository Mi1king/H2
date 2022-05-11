<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-3">
            <form action="item_create_script.php" enctype="multipart/form-data" method="POST">
                <table class="table table-striped">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT
                categories.`name`
            FROM
                categories";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));

                    ?>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Picture</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input class="form-control" name="name" placeholder="Name" required="true">
                            </td>
                            <td>
                                <input class="form-control" type="file" name="image">
                            </td>
                            <td>
                                <select class="form-control" name="category" required="true">
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <!-- <input class="form-control" name="category" placeholder="Category" required="true"> -->
                            </td>
                            <td>
                                <input class="form-control" name="price" placeholder="Price" required="true">
                            </td>
                            <td>
                                <input class="form-control" name="time" placeholder="Time duration" required="true">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>