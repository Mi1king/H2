<div class="container-fluid decor_bg" id="content">
    <div class="row">
        <div class="container">
            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                <?php
                if (isset($error)) {
                ?>
                    <div>
                        <?php echo $error; ?>
                    </div>
                    <a href='settings.php' class='btn btn-primary btn-block'>Cancel</a><br><br>
                <?php
                } else {
                ?>
                    <h4>Add coach certification</h4>
                    <form role="form" action="certification_submit.php" method="POST">
                        <div class="form-group">
                            <input class="form-control" placeholder="certification code" name="code" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Apply certification</button>
                        <a href='settings.php' class='btn btn-primary btn-block'>Cancel</a><br><br>
                    </form><br />
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>