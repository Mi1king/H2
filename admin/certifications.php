<div class="container-fluid" id="content">
    <div class="row decor_bg">
        <div class="col-md-8 col-md-offset-2" style="margin-top:5.33333333%;">
            <table class="table table-striped">
                <?php
                $query = "SELECT
                certifications.id,
                certifications.user_id,
                users.`name`,
                users.email,
                certifications.certification_code
            FROM
                certifications
                INNER JOIN users ON certifications.user_id = users.id 
            WHERE
                certifications.`status` = 'created'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                if (mysqli_num_rows($result) >= 1) {
                ?>
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>User No.</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Certification</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                            <td>" . "#" . $row["id"] . "</td>
                            <td>" . "#" . $row["user_id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["certification_code"] . "</td>
                            <td>
                            <a href='cer_approve.php?id={$row['id']}' class='btn btn-primary btn-block'>Approve</a>
                            <a href='cer_refuse.php?id={$row['id']}' class='btn btn-primary btn-block'>Refuse</a>
                            </td>
                            </tr>";
                        }
                    }else{
                        echo "There is no certifications need to approve!";
                    }
                    ?>
                </tbody>
                <?php
                ?>
            </table>
        </div>
    </div>
</div>