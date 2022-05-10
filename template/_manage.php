<?php
$user_id = $_SESSION['user_id'];
$query = "SELECT
users.`name`,
users.email,
users.contact,
users.city,
users.address 
FROM
users 
WHERE
users.id = '$user_id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
?>


<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4" id="settings-container">
            <!-- <form method="post" enctype="multipart/form-data" action="upload.php">
                <div class="form-group">
                    <label>User Image</label>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <input type="submit" name="upload" value="Submit">
                </div>
            </form> -->
            <form action="manage_script.php" method="POST">
                <h6>Name</h6>
                <div class="form-group">
                    <input type="name" class="form-control" name="new-name" placeholder="New Name" value=<?php
                                                                                                            echo  $row['name'];
                                                                                                            ?> required="true">
                </div>
                <h6>Email</h6>
                <div class="form-group">
                    <input type="email" class="form-control" name="new-email" placeholder="New Email" value=<?php
                                                                                                            echo  $row['email'];
                                                                                                            ?> required="true">
                </div>
                <h6>Contact</h6>
                <div class="form-group">
                    <input type="contact" class="form-control" name="new-contact" placeholder="New Contact" value=<?php
                                                                                                                    echo  $row['contact'];
                                                                                                                    ?> required="true">
                </div>
                <h6>City</h6>
                <div class="form-group">
                    <input type="city" class="form-control" name="new-city" placeholder="New City" value=<?php
                                                                                                            echo  $row['city'];
                                                                                                            ?> required="true">
                </div>
                <h6>Address</h6>
                <div class="form-group">
                    <input type="address" class="form-control" name="new-address" placeholder="New Address" value=<?php
                                                                                                                    echo  $row['address'];
                                                                                                                    ?> required="true">
                </div>

                <button type="submit" class="btn btn-primary">Confirm</button>
                <?php
                if (isset($_GET['email_error'])) {
                    echo "<br><br><b class='red'>" . $_GET['error'] . "</b>";
                }
                ?>
            </form>
        </div>
    </div>
</div>