<?php

include_once ('AllDb.php'); 
$sesdata = new Databases;  

session_start();
$user_check=$_SESSION['login_user'];

$row=$sesdata->ses($user_check);

$login_session=$row['username'];
if(!isset($_SESSION['login_user']))
{
    header('location: Login.php');
    exit;
}

