<?php
//starting session
session_start();

//set the user
if(!isset($_SESSION['session_user'])){
        $_SESSION['session_user']="";
}
//set the role
if(!isset($_SESSION['role'])) {
    $_SESSION['role']="";
}
//save username in the session 
$session_user=$_SESSION['session_user'];
$session_role=$_SESSION['role'];
?>

