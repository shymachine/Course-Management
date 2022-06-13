<?php
include("session.php");
include("db_conn.php");

if($session_user ==="") {
    echo "Sign in to proceed";
    return;
}

if($session_role !== "student") {
    echo "Not a student";
    return;
}

$unit = $_POST['unitcode'];
$unitname = $_POST['unitname'];

$query = "SELECT userid FROM USERDB WHERE userid='$session_user'";
$res = $mysqli->query($query);

if(!$res) {
    echo("Error description:" .$mysqli->error);
    $mysqli->close();
    return;
}

if($res->num_rows === 0) {
   echo "User don't exist";
   return;
}

$query = "SELECT student_id FROM STUDENTDB WHERE email_address LIKE '$session_user%'";
$res = $mysqli->query($query);

if(!$res) {
    echo("Error description:" .$mysqli->error);
    $mysqli->close();
    return;
}

$row = $res->fetch_array(MYSQLI_ASSOC);
$studentId = $row['student_id'];

$query = "SELECT unitcode FROM ENROL_UNITS WHERE unitcode='$unit' AND studentid='$studentId'";
$res = $mysqli->query($query);
if(!$res) {
    echo("Error description:" .$mysqli->error);
    $mysqli->close();
    return;
}

if($res->num_rows > 0) {
    echo "Enrolled Already";
    return;
}

$query = "INSERT into ENROL_UNITS(studentid, unitcode, unitname) VALUES ('$studentId', '$unit', '$unitname')";

$res = $mysqli->query($query);
if(!$res) {
    echo("Error description:" .$mysqli->error);
    $mysqli->close();
    return;
}
echo "Successfully Added";
$mysqli->close();
return;
?>
