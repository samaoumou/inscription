<?php 

session_start();

if(isset($_SESSION['login']))
{
    setcookie('login', $_SESSION['login'],time()+7*24*3600, null, null, false, true);
}

session_destroy();

header('location:login.php');

?>