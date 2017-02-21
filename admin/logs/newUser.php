<?php
require_once("../../admin/include/session.php");
require_once("../../admin/include/connection.php");
require_once("../../admin/include/functions.php");
include('backend.php');
//confirm_logged_in();

$upmsg = array();

// START FORM PROCESSING
if (isset($_POST['submit'])) { // Form has been submitted.
    $errors = array();

    // perform validations on the form data
    $fullname = trim(mysqli_real_escape_string($connection, $_POST['name']));
    $username = trim(mysqli_real_escape_string($connection, $_POST['user']));
    $password = trim(mysqli_real_escape_string($connection, $_POST['pass']));
    $confirm_password = trim(mysqli_real_escape_string($connection, $_POST['con_pass']));
    $iterations = ['cost' => 10];//number of times hased!
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);
    if($password != $confirm_password)
    {
        $message = "Password Don´t match";
    }
    else
    {
        $query = "INSERT INTO `login` (`ID`, `username`, `password`, `fullname`) VALUES (NULL, '$username', '$hashed_password', '$fullname')";
        $result = mysqli_query($connection, $query);
        array_push($upmsg, "User for $fullname has been created!! ");
    }
}
if (!empty($message))
{
    echo "<p>" . $message . "</p>";
}
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="../styling/stylesheet.css">
<h2 align="center">Create New User <a href="../../index.php">| FRONTPAGE |</a></h2>
<div class="upMsg">
    <?php
    foreach ($upmsg as $msg)
    {
        echo "<h2>$msg</h2>";
    }
    ?>
</div>
<div class="addMovie">
    <form action="newUser.php" method="post" style="margin-left: 38.5%">
        <label>Full Name: </label>
        <input type="text" name="name"  maxlength="50" value="" /><br>
        <label>Username: </label>
        <input type="text" name="user"  maxlength="30" value="" /><br>
        <label>Password: </label>
        <input type="password" name="pass" maxlength="30" value="" /><br>
        <label>Confirm password: </label>
        <input type="password" name="con_pass" maxlength="30" value="" /><br>
        <input style="color: black" type="submit" name="submit" value="Create" />
    </form>
</div>
</body>
</html>
<?php
if (isset($connection))
{
    mysqli_close($connection);
}
?>