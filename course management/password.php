<?php
include('db_conn.php');
include('session.php');

if($_POST && isset($_POST['passwd'])) {
    $password = crypt($_POST['passwd']);
    $query = "UPDATE USERDB SET password='$password' WHERE userid='$session_user'";
    $res = $mysqli->query($query);
    if(!$res) {
        echo("Error description:" .$mysqli->error);
        $mysqli->close();
        return;
    } 
    echo "Successfully Changed";
}
$mysqli->close();
return;
?>

