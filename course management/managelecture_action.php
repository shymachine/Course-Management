<?php
include("db_conn.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
   $sqlQuery = "UPDATE CAMPUS_UNIT  SET campus='" .$input['campus']."', lecturer='".$input['lecturer']."' WHERE id='" .$input['id']."'";
    $res = $mysqli->query($sqlQuery);
    if(!$res) {
        echo("Error description:" .$mysqli->error);
        $mysqli->close();
        return;
    }
} else if($input['action'] === 'delete') {
    $sqlQuery = "DELETE FROM CAMPUS_UNIT WHERE id='" .$input['id']."'";
    $res = $mysqli->query($sqlQuery);
    if(!$res) {
        echo("Error description:" .$mysqli->error);
        $mysqli->close();
        return;
    }
}
mysqli_close($mysqli);
echo json_encode($input);
?>
