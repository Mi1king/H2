<div class="container-fluid decor_bg" id="content">
    <div class="row">
        <div class="container">
            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                <h4>LOGIN</h4>
                <form role="form" action="certification_submit.php" method="POST">
                    <div class="form-group">
                        <input class="form-control" placeholder="certification code" name="code" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Apply certification</button>
                    <a href='settings.php' class='btn btn-primary btn-block'>Cancel</a><br><br>
                    <div>
                        <?php
                        if (isset($_GET['error'])) {
                            echo $_GET['error'];
                        }
                        ?>
                    </div>
                </form><br />
            </div>
        </div>
    </div>
</div>