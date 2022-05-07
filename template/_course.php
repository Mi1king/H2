<?php
$course_name = $_GET['id'];
$query = 'SELECT
items.*
FROM
items
WHERE
items.id = 1';

$result = mysqli_query($con, $query) or die(mysqli_error($con));
if (mysqli_num_rows($result) >= 1) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<h3 class='glyphicon glyphicon-facetime-video'> 1 V 1 Course: ".$row['name']."</h3>";
    }
}
?>

<div>
    <!-- TODO: move to steam -->
    <center>
        <video width="320" height="240" controls="controls" autoplay="autoplay">
            <source src="/i/movie.ogg" type="video/ogg" />
            <source src="/i/movie.mp4" type="video/mp4" />
            <source src="/i/movie.webm" type="video/webm" />
            <object data="/i/movie.mp4" width="320" height="240">
                <embed width="320" height="240" src="/i/movie.swf" />
            </object>
        </video>
    </center>
</div>