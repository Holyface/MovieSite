<?php
require_once("../../admin/include/session.php");
require_once("../../admin/include/connection.php");
require_once("../../admin/include/functions.php");
include('backend.php');
confirm_logged_in();
$upmsg = array();
if(isset($_POST['submit'])) {
    foreach ($_POST['toEdit']as $editID){
        $query = "UPDATE movies SET `title`='".$_POST['TITLE']."', `year`='".$_POST['YEAR']."' WHERE ID = $editID";
        mysqli_query($connection, $query) or die('Error querying database.');
    }
    array_push($upmsg, "You have successfully updated the selected Movie thank you!!");
}
?>
<html>
<script>
    function myFunction() {
        confirm("CONFIRM EDIT MOVIE");
    }
</script>
<body>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<h2 style="text-align: center">Edit/Update existing Movies in DB <a href="../../index.php">| FRONTPAGE |</a></h2>
<div class="upMsg">
    <?php
    foreach ($upmsg as $msg)
    {
        echo "<h2>$msg</h2>";
    }
    ?>
</div>
<div class="wrapper>
    <div>
        <form action='editMovie.php' method='post' enctype='multipart/form-data'>
            <?php
            $query = "SELECT * FROM movies";
            mysqli_query($connection, $query) or die ('Error querying database.');
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($result)){
                $ID=$row['ID'];
                $title=$row['TITLE'];
                $year=$row['YEAR'];
                $poster="../css/images/".$row['POSTER'];
                echo"<div class='wrapper'>
                    <label>NEW Name: </label><input style='color: black' type='text' name='movie' placeholder=$movie size='20'><br>
                    <div>curr: $title</div> 
                    <div>
                        <img src='$poster' alt='$movie, $year'>
                    </div>           
                    <label>upd. Release Year: </label><input style='color: black' type='text' name='year' placeholder='Year' size='4' minlength='4' maxlength='4'>curr: $year<br>
                    <textarea class='nooResize' name='review' cols='18' rows='5' placeholder='Update The Review'></textarea><br>
                    <legend>▶<input style='color: black' type='checkbox' name='toEdit[]' value='".$row['ID']."'>◀ Check box to edit!</legend>
                    <button onclick='myFunction()' style='color: black' type='submit' name='submit'>Edit Movie</button>
                    </div>";
            }
            ?>
        </form>
    </div>
</div>
</body>

</html>