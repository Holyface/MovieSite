<?php
require("../../admin/include/session.php");
require("../../admin/include/connection.php");
require("../../admin/include/functions.php");
confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<title>Login</title>
<body>
<h2 style="text-align: right">BACKEND</h2>
<div class="right">
    <div class="dropdown">
    <button class="dropbtn" style="font-family:'Century Gothic', sans-serif;">SELECT</button>
    <div class="dropdown-content" style="text-align: left;">
        <a href="../crud/addMovies.php">ADD MOVIES</a><br>
        <a href="../crud/editMovie.php">EDIT MOVIES</a><br>
        <a href="../crud/removeMovies.php">REMOVE MOVIES</a><br>
        <a href="newUser.php">ADD USERS</a><br>
        <a href="logout.php">LOGOUT</a><br>
    </div>
    </div>
</div>
</body>
</html>