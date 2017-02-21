<?php
require_once("../../admin/include/session.php");
require_once("../../admin/include/connection.php");
require_once("../../admin/include/functions.php");
include('backend.php');

//confirm_logged_in();

spl_autoload_register(function ($class)
{
    include ("".$class.".php");
});
define("MAX_SIZE", "5000");
$upmsg = array();
if(isset($_POST['submit']))
{
    if($_FILES['picture']['name'])
    {
        $imageName = $_FILES['picture']['name'];
        $file = $_FILES['picture']['tmp_name'];
        $imageType = getimagesize($file);
        if($imageType[2] = 1|| $imageType[2] = 2 || $imageType[2] = 3)
        {
            $size = filesize($_FILES['picture']['tmp_name']);
            $prefix = uniqid();
            $poster = $prefix."_".$imageName;
            $newName="../css/images/".$poster;

        }
        else
        {
            array_push($upmsg, "Unknown image type!! ");
        }

        $title = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['movie'])));
        $year = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['year'])));

        $query = "INSERT INTO TABLE movies (`TITLE`, `YEAR`, `POSTER`) VALUES ('$title', '$year','$poster')";

        mysqli_query($connection, $query) or die('Error querying database.');
        array_push($upmsg, "The Upload Was a Success!! ");
    }
    else
    {
        array_push($upmsg, "Nothing was selected! Select a poster!");
    }
}
?>
<!DOCTYPE html>
<html>
<script>
    function myFunction() {
        confirm("ARE YOU SURE YOU WANT TO ADD THIS TO DATABASE");
    }
</script>
<body>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<h2 style="text-align: center">Add Movies To DB <a href="../../index.php">| FRONTPAGE |</a></h2>
<div class="upMsg">
    <?php
    foreach ($upmsg as $msg)
    {
        echo "<h2>$msg</h2>";
    }
    ?>
</div>
<div class="wrapper">
    <form action="addMovies.php" method="post" enctype="multipart/form-data">
        <label>Title: </label><input style="color: black" type="text" name="movie" placeholder="Movie" size="20" required autofocus><br>
        <label>Year: </label><input style="color: black" type="text" name="year" placeholder="Year" size="4" minlength="4" maxlength="4"><br>
        <label>Poster: </label><input style="color: black" type="file" name="picture" required>
        <br>
        <br>
        <button onclick="myFunction()" style="color: black" type="submit" name="submit">INSERT</button>
    </form>
</div>
</body>

</html>