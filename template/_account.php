<div class="container" id="content">



	<?php
	$user_id = $_SESSION['user_id'];
	$query = "SELECT
	items.id AS ID, 
    items.name AS NAME,
	items.price, 
	items.category AS CATEGORY, 
	items.time AS TIME, 
	items.image AS IT_Photo,
	users_items.`status`, 
	users_items.user_id
FROM
	items
	INNER JOIN
	users_items
	ON 
		items.id = users_items.item_id
WHERE
	users_items.user_id = '$user_id' AND
	users_items.`status` = 'Confirmed'";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	$query_user = "SELECT
	*, 
	users.`name` AS NAME, 
	users.email AS EMAIL, 
	users.`password` AS PASSWORD, 
	users.contact AS CONTACT, 
	users.city AS CITY, 
	users.address AS ADDRESS,
    users.photo AS PHOTO
    
FROM
	users
WHERE
	users.id = '$user_id'";
	$result_user = mysqli_query($con, $query_user) or die(mysqli_error($con));
	$name = mysqli_fetch_array($result_user);

	?>
	<div class='row'>
		<div class='col-lg-6'>
			<div class='card'>
				<div class='card-body'>
					<h5 class='glyphicon glyphicon-list-alt'> My Course<br /></h5>
					<p class='card-text'>
						<?php
						if (mysqli_num_rows($result) >= 1) {
							while ($row = mysqli_fetch_array($result)) {
								echo '<div class="col-md-12 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="' . $row["IT_Photo"] . '" >
						
                        <div class="caption">
                            <h3> ' . $row["NAME"] . '      ' . $row["CATEGORY"] . '
                            
                            </h3>
                            <p>Time: ' . $row["TIME"] . ' </p>';
								echo "<a href='course.php?id={$row['ID']}' class='btn btn-primary'>Start Course</a>";
						?>

				</div>
			</div>
		</div>
<?php
							}
						} else {
							echo "No Courses";
						}
?>
</p>

	</div>
</div>
</div>



<div class='row mt-8'>
	<div class='col-lg-6'>
		<div class=' card'>

			<div class='card-body'>
				<h5 class='glyphicon glyphicon-user'> Account Information</h5>
			</div>
			<ul class='list-group list-group-flush'>
				<li class='list-group-item'>
					<label>Profile photo:</label>
					<img class='rounded-circle' style='width: 8rem;' src=<?php echo $name["PHOTO"] ?>>
					<form method="post" enctype="multipart/form-data" action="upload.php">
						<input type="file" name="image">
						<input type="submit" name="upload" value="Submit">
					</form>
				</li>
				<li class='list-group-item'>User Name: <?php echo $name["NAME"] ?></li>
				<li class='list-group-item'>Email: <?php echo $name["EMAIL"] ?></li>
				<li class='list-group-item'>Contact: <?php echo $name["CONTACT"] ?></li>
				<li class='list-group-item'>City: <?php echo $name["CITY"] ?></li>
				<li class='list-group-item'>Address: <?php echo $name["ADDRESS"] ?></li>
			</ul>
			<a href='manage.php' class='card-link btn btn-primary'>Edit profile</a>
			<a href='certification_apply.php' class='card-link btn btn-primary'>Apply to be a coach</a>
			<a href='reset_psw.php' class='card-link btn btn-primary'>Reset Password</a>
		</div><br />
		<dev>
			<?php
			if (isset($_GET['error'])) {
				echo $_GET['error'];
			}
			?>
		</dev>

	</div>
</div>

</div>