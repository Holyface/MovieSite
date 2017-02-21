<?php
require("../../admin/include/session.php");
require("../../admin/include/connection.php");
require("../../admin/include/functions.php");

if (logged_in()) {
    redirect_to("../crud/backend.php");
}

if (isset($_POST['submit'])) {
    $username = trim(htmlspecialchars(mysqli_real_escape_string($connection, $_POST['user'])));
    $password = trim(htmlspecialchars(mysqli_real_escape_string($connection,$_POST['pass'])));

    $query = "SELECT `ID`, `userName`, `password` FROM login WHERE `userName` = ('$username') LIMIT 1";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1);
    {

        $found_user = mysqli_fetch_array($result);
        if(password_verify($password, $found_user['password']))
        {
            $_SESSION['user_id'] = $found_user['ID'];
            $_SESSION['user'] = $found_user['userName'];
            redirect_to("../crud/backend.php");
        }
        else
        {

            $message = "Username/password combination incorrect.<br>Try again?";
        }
    }
}
else
{
    if (isset($_GET['logout']) && $_GET['logout'] == 1)
    {
        $message = "You are now logged out.";
    }
}
if (!empty($message))
{
    echo "<p>" . $message . "</p>";
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<head>
    <meta http-equiv="Content-Type" />
</head>
<title>Login</title>
<body>
<?php
if (isset($connection)){mysqli_close($connection);}
?>
<div class="wrapper">
    <h2 align="center"> | LOGIN HERE <a href="../../index.php" style="color: #ffffff">| FRONTPAGE |</a></h2>
</div>

<div class="wrapper">
    <form action="login.php" method="post">
        <label>USERNAME: <input type="text" name="user" placeholder="Cock" maxlength="30"/></label><br>
        <label>PASSWORD: <input type="password" name="pass" placeholder="Balls" maxlength="30"/></label><br><br>
        <input style="color: black; font-size: 1.6em;" type="submit" name="submit" value="Login" maxlength="30"/>
    </form>
    <br>
</div>
</body>
</html>
