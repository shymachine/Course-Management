<?php
include("db_conn.php");

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
    $query = "UPDATE UNIT SET coordinator='" .$input['coordinator']."', semester='".$input['semester']."' WHERE id='" .$input['id']."'";
    $res = $mysqli->query($query);
    if(!$res) {
        echo("Error description:" .$mysqli->error);
        $mysqli->close();
        return;
    }
} else if($input['action'] === 'delete') {
    $query = "DELETE FROM UNIT WHERE id='" .$input['id']."'";
    $res = $mysqli->query($query);
    if(!$res) {
        echo("Error description:" .$mysqli->error);
        $mysqli->close();
        return;
    }

mysqli_close($mysqli);
echo json_encode($input);
}
?> 
