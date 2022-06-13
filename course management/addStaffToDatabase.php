<?php
include('db_conn.php');
?>

<?php
if($_POST && isset($_POST['staffId'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['passwd'],$_POST['phonenumber'],$_POST['degree'], $_POST['specialization'])) {
     $staffId = $_POST['staffId'];
     $firstName = $_POST['fname'];
     $lastName = $_POST['lname'];
     $Email = $_POST['email'];
     $password = $_POST['passwd'];
     $phonenumber = $_POST['phonenumber'];
     $encryptpass = crypt($password);
     $degree = $_POST['degree'];
     $specialization = $_POST['specialization'];

     //echo $studentId;
     //echo $firstName;
     //echo $lastName;
     //echo $Email;
     //echo $password;
     //echo $dob;
     //echo $encryptpass;

    $sqlQuery = "SELECT staff_id from STAFFDB  WHERE staff_id ='$staffId'";
    $sqlRes = $mysqli->query($sqlQuery);
    if($sqlRes->num_rows > 0) {
        echo "Staff Id exists";
        $sqlRes->free();
        $mysqli->close();
        return;
    }

    $sqlQuery = "INSERT into STAFFDB (staff_id, first_name, last_name,  email_address, phone_number, highest_degree, specialization) VALUES ('$staffId', '$firstName', '$lastName', '$Email', '$phonenumber', '$degree', '$specialization')";

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

    $role = "staff";

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
