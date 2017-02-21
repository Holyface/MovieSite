<?php
require_once("../../admin/include/session.php");
require_once("../../admin/include/connection.php");
require_once("../../admin/include/functions.php");
include('backend.php');
//confirm_logged_in();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
<?php
if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page ="index";
}
switch ($page)
{
        default:
            include("backend.php");
            break;
        case "addMovies";
            include("addMovies.php");
            break;
        case "editMovies";
            include("editMovie.php");
            break;
        case "removeMovies";
            include("removeMovies.php");
            break;
        case "index";
            include("../../index.php");
            break;
        case "newuser";
            include("../logs/newUser.php");
            break;
}
?>
</body>
</html>