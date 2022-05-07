<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4" id="settings-container">
            <h4>Change Password</h4>
            <form action="settings_script.php" method="POST">
                <div class="form-group">
                    <input type="password" class="form-control" name="old-password" placeholder="Old Password" required="true">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="New Password" required="true">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password1" placeholder="Comfirm Password" required="true">
                </div>
                <button type="submit" class="btn btn-primary">Reset</button>
                <?php
                if (isset($_GET['email_error'])) {
                    echo "<br><br><b class='red'>" . $_GET['error'] . "</b>";
                }
                ?>
            </form>
        </div>
    </div>
</div>