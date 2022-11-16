<?php 

session_start();

if(isset($_SESSION['login']))
{
    setcookie('login', $_SESSION['email'],time()+7*24*3600, null, null, false, true);
}

session_destroy();

header('location:index.php');

?>