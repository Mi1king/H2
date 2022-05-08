<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4" id="settings-container">
            <form method="post" enctype="multipart/form-data" action="upload.php">
		<div class="form-group">
			<label>User Image</label>
			<input type="file" name="image">
		</div>
		<div class="form-group">
			<input type="submit" name="upload" value="Submit">
		</div>
	</form>
            
            <form action="manage_script.php" method="POST">
                <h6>Name</h6>
                <div class="form-group">
                    <input type="name" class="form-control" name="new-name" placeholder="New Name" required="true">
                </div>
                <h6>Email</h6>
                <div class="form-group">
                    <input type="email" class="form-control" name="new-email" placeholder="New Email" required="true">
                </div>
                <h6>Contact</h6>
                <div class="form-group">
                    <input type="contact" class="form-control" name="new-contact" placeholder="New Contact" required="true">
                </div>
                <h6>City</h6>
                <div class="form-group">
                    <input type="city" class="form-control" name="new-city" placeholder="New City" required="true">
                </div>
                <h6>Address</h6>
                <div class="form-group">
                    <input type="address" class="form-control" name="new-address" placeholder="New Address" required="true">
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