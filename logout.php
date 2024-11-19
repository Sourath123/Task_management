<?php
session_start();
unset($_SESSION['login']); 
unset($_SESSION['uid']); 
unset($_SESSION['email']); 
unset($_SESSION['login_user_type']); 
session_destroy();
header("location:login.php");

?>