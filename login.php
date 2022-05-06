<?php
require 'includes/common.php';

if(isset($_SESSION['email'])){
  header('location:products.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Health Hour</title>
        <link href="CSS/bootstrap.css" rel="stylesheet">
        <link href="CSS/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include 'includes/header.php';
        ?>
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container">
                    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                        <h4>LOGIN</h4>
                        <form role="form" action="login_submit.php" method="POST">
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="Email"  name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            <button onClick="window.location.href='signup.php'"  class="btn btn-primary">Register</button><br><br>
                            <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
                            <div>
                                        <?php 
                                        if(isset($_GET['error'])){
                                            echo $_GET['error'];
                                        } 
                                        ?> 
                            </div>
                        </form><br/>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>