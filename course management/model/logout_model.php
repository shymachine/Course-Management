<?php
    session_start();

    if(!isset($_SESSION['username'])) {
	die('ACCESS DENIED');
    }
    session_destroy();
?>
