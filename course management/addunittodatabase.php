<?php
include("session.php");
include("db_conn.php");

if($session_user ==="") {
    echo "Sign in!";
    return;
}

if($session_role !== "coordinator") {
    echo "Not a degree coordinator";
    return;
}

$unitcode = $_POST["unitcode"];
$unitname = $_POST["unitname"];
$unitcoordinator = $_POST["coordinator"];
$semester = $_POST["semester"];

$query = "INSERT into UNIT(id, unit_code, unit_name, coordinator, semester) VALUES ('', '$unitcode', '$unitname', '$unitcoordinator', '$semester')";
$res = $mysqli->query($query);
if(!$res) {
    echo("Error description:" .$mysqli->error);
    $mysqli->close();
    return;
}

echo "Added Successfully";
return;
?>
