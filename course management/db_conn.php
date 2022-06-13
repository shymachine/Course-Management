<?php
//connect to mysql

$mysqli = new mysqli('localhost', 'ls33', '491352', 'ls33');

if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
?>

