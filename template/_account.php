<div class="container" id="content">
    

    <?php
    
    $user_id = $_SESSION['user_id'];
    $query = "SELECT
	items.id AS ID, 
    items.name AS NAME,
	items.price, 
	items.category AS CATEGORY, 
	items.time AS TIME, 
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
    $result = mysqli_query($con, $query)or die(mysqli_error($con));
    $query_user = "SELECT
	*, 
	users.`name` AS NAME, 
	users.email AS EMAIL, 
	users.`password` AS PASSWORD, 
	users.contact AS CONTACT, 
	users.city AS CITY, 
	users.address AS ADDRESS
FROM
	users
WHERE
	users.id = '$user_id'";
    $result_user = mysqli_query($con, $query_user)or die(mysqli_error($con));
    $name = mysqli_fetch_array($result_user);
    echo '<div class="jumbotron user" id="user-jumbotron">
        <h1>'.$name["NAME"].'</h1>
    </div>';
    echo  "My Course"."<br />" ;
     if (mysqli_num_rows($result) >= 1) {
                                          
            
             while ($row = mysqli_fetch_array($result)) {                                                             
                echo '<div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="img/' . $row["ID"] . '.jpg" />
                        <div class="caption">
                            <h3> ' . $row["NAME"] . '      ' . $row["CATEGORY"] . '
                            
                            </h3>
                            <p>Time: ' . $row["TIME"] . ' </p>';
                 echo"<a href='course.php?id={$row['ID']}' class='btn btn-primary'>Start Course</a>";
                 echo"<a href='course_time_change.php?id={$row['ID']}' class='btn btn-primary'>Change Time</a><a href='order_delete.php?id={$row['ID']}' class='btn btn-primary'>Delete</a>";
                 echo'
                                </div>
                                </div>
                                </div>' ;  
                 
                                }
                                                  
                        } else {
                            echo "No Courses";
                        }
    
                        
    
    

?>
<?php
    
echo "<div class='row'>
		<div class='col-lg-6'>
			<div class='card'>
				<div class='card-body'>
					<h3 class='card-title'>My Course<br /></h3>
					<h4 class='card-subtitle mb-3'>这是卡片的幅标题</h4>
					<p class='card-text'>这是卡片的文本内容，需要添加一个card-text的class</p>
					
				</div>
			</div>
		</div>";

		

		
echo "		<div class='col-lg-4'>
			<div class='card'>
				<div class='card-header'>这是卡片的头部，也叫页眉</div>
				<ul class='list-group list-group-flush'>
					<li class='list-group-item'>这是列表的文字</li>
					<li class='list-group-item'>这是列表的文字</li>
					<li class='list-group-item'>这是列表的文字</li>
				</ul>
				<div class='card-footer'>这是卡片的底部，也叫页脚</div>
			</div>
		</div>
	</div>";
?>  
    
</div>

