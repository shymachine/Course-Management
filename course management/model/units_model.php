<?php
    session_start();
    
    if(!(isset($_SESSION['username']))) {
        return;
    }
    
    require_once('connect_to_db.php');

    $stmt = $pdo->prepare("SELECT unit_code, unit_name, coordinator, semester_name, campus_name, description FROM UNIT JOIN CAMPUS JOIN SEMESTER WHERE UNIT.semester=SEMESTER.semester_id AND UNIT.campus_id=CAMPUS.campus_id");
    $stmt->execute();
    $data = $stmt->fetchAll();
    $result = array();

    foreach($data as $row) {

        $result[] = ['unit_code'=>$row['unit_code'], 'unit_name'=>$row['unit_name'], 
	             'cordinator'=>$row['coordinator'], 'semester'=>$row['semester_name'],
        	     'campus'=>$row['campus_name'], 'description'=>$row['description']];
    }
    $pdo = null;
    echo json_encode($result);
?>
