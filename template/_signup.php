
<div class="container-fluid decor_bg" id="content">
    <div class="row">
        <div class="container">
            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                <h2>SIGN UP</h2>
                <form action="signup_script.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                        <div>
                            <?php
                            if (isset($_GET['email_error'])) {
                                echo $_GET['email_error'];
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" pattern=".{6,}" required>
                        <div>
                            <?php
                            if (isset($_GET['password_error'])) {
                                echo $_GET['password_error'];
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Contact" maxlength="10" size="10" name="contact" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="City" name="city" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Address" name="address" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>