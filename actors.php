<?php
require("admin/include/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8 utf-8">
    <title>Actors</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<!-- SLIDESHOW -->
<ul class="cb-slideshow">
    <li><span>1</span></li>
    <li><span>2</span></li>
    <li><span>3</span></li>
</ul>

<div class="container">

    <?php
    /*$query = "SELECT * FROM movies";
    mysqli_query($connection, $query) or die("We are nut rubbers!");

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result)) {
        $movieid = $row['MOVIE_ID'];
        $title = $row['TI'];
        $year = $row['price'];
        $directorid = "picz/Menupics/" . $row['picture'];
    }
    */
    ?>
</div>
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
    <h1>actors</h1>

    <?php
    $query = "SELECT * FROM actors";
    mysqli_query($connection, $query) or die ('Error');

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result))
    {
        $fname = $row['FNAME'];
        $lname = $row['LNAME'];
        $photo = "css/images/".$row['PHOTO'];

        echo "<div class='poster'>
                <img src='$photo'>
                <p class='customfont' style='font-size: 20px;'>
                ".$fname."
                </p>
                ".$lname."
              </div>";
    }

    ?>

</div>

</body>

</html>