<?php
include("db_conn.php");
include("session.php");

error_reporting(E_ALL);
ini_set('display_errors', 'on');

if($session_user === "") {
    header("Location: ./loggedPage.php?error=Sign in to access this page");
    return;
}

if($session_role === "student") {
    header("Location: ./loggedPage.php?error=Not a teaching staff");
    return;
}

$unitid = $_POST['unit'];
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/cms.css">
    <title> Enrolled Student List | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
    <div class ="container">
        <h2 align ="center">Enrolled Student List</h2><br>
        <br>
        <p><i>User:<?php echo $session_user; ?></i></p>
        <div>
             <table class='table table-stripped' id="enrolstudenttable">
                 <thead>
                     <tr>
                         <th>Student ID</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Email Address</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                         $query = "SELECT * FROM STUDENTDB JOIN ENROL_UNITS ON STUDENTDB.student_id=ENROL_UNITS.studentid  WHERE ENROL_UNITS.unitcode='$unitid'";
                         $res = $mysqli->query($query);
                         if(!$res) {
                             echo("Error description:" .$mysqli->error);
                             $mysqli->close();
                             return;
                         }
                         while($row = $res->fetch_array(MYSQLI_ASSOC)) {
                             echo "<td>".$row['student_id']."</td>";
                             echo "<td>".$row['first_name']."</td>";
                             echo "<td>".$row['last_name']."</td>";
                             echo "<td>".$row['email_address']."</td>";
                         }
                     ?>
                 </tbody>
             </table>
        </div>

       <br>
       <br>
       <div class="row">
           <div class="col-xs-3">
               <a href="loggedPage.php" class="btn btn-info">Back</a>
           </div>
       </div>

    </div>
</body>
</html>


