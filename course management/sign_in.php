<?php
include("session.php");
include("db_conn.php");


$user = $_POST['uname'];
$password = $_POST['psw'];

echo $user;
echo $password;

$sqlQuery = "SELECT * from USERDB  WHERE userid='$user'";
$result = $mysqli->query($sqlQuery);

if(!$result) {
    echo("Error description:" .$mysqli->error);
    $mysqli->close();
    return;
}

$row = $result->fetch_array(MYSQLI_ASSOC);

if($row['userid'] != $user || $user=="") {
    header('Location: ./loginPage.php?error=invalid_username');
    echo $row['userid'];
    echo $user;
} else {
    if(hash_equals($row['password'], crypt($password, $row['password']))) {
        $session_user = $row['userid'];
        $session_role = $row['role'];
        $_SESSION['session_user']=$session_user;
        $_SESSION['role']=$session_role;
        header('Location: ./loggedPage.php');
    }
    else {
        header('Location: ./loginPage.php?error=invalid_password');
    }
}
$mysqli->close();
?>
