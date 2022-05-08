<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-6 col-md-offset-1" style="margin-top:8.33333333%;">
            <table class="table table-striped">
                <?php
                $query = "SELECT
                users.* 
            FROM
                users";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                ?>
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Contact</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Photo</th>
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
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["password"] . "</td>
                            <td>" . $row["contact"] . "</td>
                            <td>" . $row["city"] . "</td>
                            <td>" . $row["address"] . "</td>
                            <td>" . $row["photo"] . "</td>
                            <td>
                                <a href='user_del.php?id={$row['id']}' class='btn btn-primary btn-block'>Delete</a>
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