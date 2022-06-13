<?php
include('db_conn.php');

error_reporting(E_ALL);
ini_set('display_errors', 'on');
?>

<?php
if($_POST && isset($_POST['studentId'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['passwd'], $_POST['dob'], $_POST['phonenumber'], $_POST['address'])) {
     $studentId = $_POST['studentId'];
     $firstName = $_POST['fname'];
     $lastName = $_POST['lname'];
     $Email = $_POST['email'];
     $password = $_POST['passwd'];
     $dob = $_POST['dob'];
     $phonenumber = $_POST['phonenumber'];
     $address = $_POST['address'];
     $encryptpass = crypt($password);
     $dateofbirth = strtotime($dob);

     //echo $studentId;
     //echo $firstName;
     //echo $lastName;
     //echo $Email;
     //echo $password;
     //echo $dob;
     //echo $encryptpass;

    $sqlQuery = "SELECT student_id from STUDENTDB WHERE student_id='$studentId'";
    $sqlRes = $mysqli->query($sqlQuery);
    if($sqlRes->num_rows > 0) {
        echo "Student Id exists";
        $sqlRes->free();
        $mysqli->close();
        return;
    }

    $sqlQuery = "INSERT into STUDENTDB (student_id, first_name, last_name,  email_address, phone_number, address, dob) VALUES ('$studentId', '$firstName', '$lastName', '$Email', '$phonenumber', '$address', '$dateofbirth')";

    $sqlRes = $mysqli->query($sqlQuery);
    if (!$sqlRes) {
        echo("Error description:" . $mysqli->error);
        return;
    }
    $userId = explode("@", "$Email");

    $query = "SELECT userid from USERDB where userid='$userId[0]'";
    $res = $mysqli->query($query);

    if(!$res) {
        echo("Error description:" .$mysqli->error);
        $mysqli->close();
        return;
    }

    if($res->num_rows > 0) {
        echo "Username  already exists";
        $mysqli->close();
        return;
    }

    $role = "student";

    $query = "INSERT into USERDB (userid, password, role) VALUES ('$userId[0]', '$encryptpass', '$role')";
    $res = $mysqli->query($query);
    if(!$res){
        echo("Error description:" .$mysqli->error);
        $mysqli->close();
        return;
    }
    $mysqli->close();
    echo "Added Successfully";
    return;
}
?>
