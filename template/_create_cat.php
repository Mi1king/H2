<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4" id="settings-container">
            
            <h4>Create Category</h4>
            <form action="create_cat_script.php" method="POST">
                <div class="form-group">
                    <input type="category" class="form-control" name="category" placeholder="New Category" required="true">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <?php
                if (isset($_GET['email_error'])) {
                    echo "<br><br><b class='red'>" . $_GET['error'] . "</b>";
                }
                ?>
            </form>
        </div>
    </div>
</div>