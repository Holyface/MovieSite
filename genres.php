<?php
require("admin/include/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8 utf-8">
    <title>Genres</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<!-- SLIDESHOW -->
<ul class="cb-slideshow">
    <li><span>1</span></li>
    <li><span>2</span></li>
    <li><span>3</span></li>
</ul>


<div class="nav">
    <ul class="navbar-fixed-top" id="myTopnav">
        <li id="index"><a href="index.php">home</a></li>
        <li id="movies"><a href="movies.php">movies</a></li>
        <li id="genres"><a href="genres.php">genres</a></li>
        <li id="actors"><a href="actors.php">actors</a></li>
        <li id="directors"><a href="directors.php">directors</a></li>
    </ul>
</div>


<div class="wrapper">
    <h1>genres</h1>
    <br><br>
    <?php
    $query = "SELECT * FROM genres";
    mysqli_query($connection, $query) or die ('Error');

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result))
    {
        $genre = $row['GENRE'];

        echo "<div class='poster'>
               <p class='customfont'>
                  ".$genre."
               </p>
              </div>";
    }

    ?>
</div>

</body>

</html>