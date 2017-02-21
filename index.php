<?php
require("admin/include/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8 utf-8">
    <title>Front page</title>
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

    ?>
</div>
<div class="nav">
    <ul class="navbar-fixed-top" id="myTopnav">
        <li id="movies"><a href="movies.php">movies</a></li>
        <li id="genres"><a href="genres.php">genres</a></li>
        <li id="actors"><a href="actors.php">actors</a></li>
        <li id="directors"><a href="directors.php">directors</a></li>
    </ul>
</div>
<br>
<div class="wrapper">
    WELCOME!
</div>
<br>
<div class="wrapper">
    FIND MOVIES
    <br>
    <?php
    $query = "SELECT * FROM movies LIMIT 3";
    mysqli_query($connection, $query) or die ('Error');

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result))
    {
        $title = $row['TITLE'];
        $year = $row['YEAR'];
        $poster = "css/images/".$row['POSTER'];

        echo "<div class='poster'>
                <img src='$poster'>
              </div>";
    }

    ?>
</div>
<br>
<div class="wrapper">
    DISCOVER BY GENRE
    <br>
    <?php
    $query = "SELECT * FROM genres LIMIT 5";
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
<br>
<div class="wrapper">
    LOOK UP ACTORS
    <br>
    <?php
    $query = "SELECT * FROM actors LIMIT 3";
    mysqli_query($connection, $query) or die ('Error');

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result))
    {
        $fname = $row['FNAME'];
        $lname = $row['LNAME'];
        $photo = "css/images/".$row['PHOTO'];

        echo "<div class='poster'>
                  <img src='$photo'>
                </div>";
    }

    ?>

</div>
<br>
<div class="wrapper">
    LOOK UP DIRECTORS
    <br><br>
    <?php
    $query = "SELECT * FROM directors LIMIT 3";
    mysqli_query($connection, $query) or die ('Error');

    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($result))
    {
        $fname = $row['FNAME'];
        $lname = $row['LNAME'];
        $photo = "css/images/".$row['PHOTO'];

        echo "<div class='poster'>
                <img src='$photo'>
              </div>";
    }

    ?>

</div>

</body>

</html>