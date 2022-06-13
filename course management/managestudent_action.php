<?php
include("db_conn.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
    $sqlQuery = "UPDATE STUDENTDB SET email_address='" .$input['email_address']."'  WHERE student_id='" .$input['student_id']."'";
    $res = $mysqli->query($sqlQuery);
    if(!$res) {
        echo("Error description:" .$mysqli->error);
        $mysqli->close();
        return;
    }
}else if($input['action'] === 'delete') {
    $sqlQuery = "DELETE FROM STUDENTDB WHERE student_id='" .$input['student_id']."'";
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


