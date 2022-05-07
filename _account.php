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
                        <img src="/img/' . $row["ID"] . '.jpg" alt="">
                        <div class="caption">
                            <h3> ' . $row["NAME"] . '</h3>
                            <p>Time: ' . $row["TIME"] . ' </p>';
                                }
                                echo'
                                </div>
                                </div>
                                </div>' ;                    
                        } else {
                            echo "No Courses";
                        }
    
                        
    
    

?>

    
    
</div>