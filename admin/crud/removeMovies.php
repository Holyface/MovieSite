<?php
require_once("../../admin/include/session.php");
require_once("../../admin/include/connection.php");
require_once("../../admin/include/functions.php");
include('backend.php');
//confirm_logged_in();
$upmsg = array();

if(isset($_POST['remove'])){
    foreach ($_POST['todelete']as $deleteID){
        $query = "DELETE FROM movies WHERE ID = $deleteID";
        mysqli_query($connection, $query) or die ('Error Querying Database');
    }
    array_push($upmsg, "You have successfully deleted the selected Movie!");
}
?>
<html>
<link rel="stylesheet" type="text/css" href="../styling/stylesheet.css">
<script>
    function myFunction() {
        confirm("CONFIRM DELETE MOVIE");
    }
</script>
<body>
<h2 style="text-align: center">Remove Movies From DB <a href="../../index.php">| FRONTPAGE |</a></h2>
<div class="upMsg">
    <?php
    foreach ($upmsg as $msg)
    {
        echo "<h2>$msg</h2>";
    }
    ?>
</div>
<div>
<div class="poster">
<form action='removeMovies.php' method='post' enctype='multipart/form-data' >
<?php
$query = "SELECT * FROM movies";
mysqli_query($connection, $query) or die ('Error querying database.');
$result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($result)){
    $ID=$row['MOVIE_ID'];
    $title=$row['TITLE'];
    $year=$row['YEAR'];
    $poster="../../css/images/".$row['POSTER'];
    //$rating=$row['rating'];
    echo"<div class='poster'>
            <div>".$title."</div>
            <div>ID: ".$ID."</div>
            <div>
                <img src='$poster' alt='$title, $year' style='height: 125px; width: 83px;'>
            </div>
            <input style='color: black' type='checkbox' name='todelete[]' value='".$row['MOVIE_ID']."'>
            <button onclick='myFunction()' style='color: black' type='submit' name='remove'>Remove Movie</button>   
            </div>
        ";
    }
    mysqli_close($connection);
?>
</form>
</div>
</div>
</body>

</html>