<div class="container-fluid decor_bg" id="content">
    <div class="row">
        <div class="container">
            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                <h4>LOGIN</h4>
                <form role="form" action="login_admin_submit.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Admin" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button><br><br>
                    <div>
                        <?php
                        if (isset($_GET['error'])) {
                            echo $_GET['error'];
                        }
                        ?>
                    </div>
                </form><br />
                <dev>
                    <a href="login.php" class="btn btn-primary btn-block">User login</a>
                </dev>
            </div>
        </div>
    </div>
</div>