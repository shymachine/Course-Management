<?php
include("db_conn.php");
include("session.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

if($session_user ==="") {
    echo "Sign in";
    return;
}

if($session_role !== "U_coordinator") {
    echo "Sign in as a unit coordinator";
    return;
}

if($_POST && isset($_POST['staffid'], $_POST['fname'], $_POST['lname'], $_POST['unitcode'], $_POST['unitname'], $_POST['campus'])) {

    $staffId = $_POST['staffid'];
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $unitcode = $_POST['unitcode'];
    $unitname = $_POST['unitname'];
    $campus = $_POST['campus'];
 
    $query = "SELECT userid FROM USERDB WHERE userid='$session_user'";
    $res = $mysqli->query($query);
    if(!$res) {
       echo("Error description:" .$mysqli->error);
       $mysqli->close();
       return; 
    }

    $query = "INSERT into TUTOR (id, staff_id, unit_code, unit_name, campus, first_name, last_name) VALUES ('', '$staffId','$unitcode', '$unitname', '$campus', '$firstName', '$lastName')";
    $res = $mysqli->query($query);
    if(!$res) {
        echo("Error description:" .$mysqli->error);
        $mysqli->close();
        return;
    }
   
    echo "Added Successfully";
    return;
}
?>
