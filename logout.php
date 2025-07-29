<?php
session_start();
if(isset($_SESSION['username'])) {
    include 'dbconnect.php';

    $username = $_SESSION['username']; 
    setcookie("logout_msg","<div class='alert alert-success'>User successfully logged out</div>",time()+5,"/");
}
session_unset();
session_destroy();
 setcookie("active", false, time() - 3600, "/"); 
header("Location: login.php");
exit;
?>
