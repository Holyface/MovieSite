<?php
require_once("../../admin/include/session.php");
require_once("../../admin/include/connection.php");
require_once("../../admin/include/functions.php");
//confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<title>Backend bro!</title>
<body>
<h2 style="text-align: right">BACKEND</h2>
<div class="wrapper">
    <div>
    <button class="dropbtn" style="font-family:'Century Gothic', sans-serif;">SELECT</button>
    <div>
        <a href="addMovies.php">INSERT MOVIE</a><br>
        <a href="editMovie.php">UPDATE MOVIE</a><br>
        <a href="removeMovies.php">DELETE MOVIE</a><br>
        <a href="../logs/newUser.php">ADD USER</a><br>
        <a href="../logs/logout.php">LOG OUT</a><br>
    </div>
    </div>
</div>
</body>
</html>