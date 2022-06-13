<?php
include("db_conn.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
    $sqlQuery = "UPDATE LECTURE_TIME SET Nine_Eleven='" .$input['Nine_Eleven']."', Eleven_One='".$input['Eleven_One']."', One_Three='" .$input['One_Three']."', Three_Five='".$input['Three_Five']."' WHERE day='" .$input['id']."'";
    $res = $mysqli->query($sqlQuery);
    if(!$res) {
        echo("Error description:" .$mysqli->error);
        $mysqli->close();
        return;
    }
}else if($input['action'] === 'delete') {
    $sqlQuery = "DELETE FROM LECTURE_TIME WHERE id='" .$input['id']."'";
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
