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
                            <a href='signup.php' class='btn btn-primary'>Register</a>
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