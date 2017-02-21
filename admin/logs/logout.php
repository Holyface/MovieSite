<?php
require_once("../../admin/include/functions.php");
// Four steps to closing a session
// (i.e. logging out)
session_start(); // 1. Find the session
$_SESSION = array(); // 2. Unset all the session variables
if(isset($_COOKIE[session_name()])) // 3. Destroy the session cookie
{
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();// 4. Destroy the session
redirect_to("login.php?logout=1");