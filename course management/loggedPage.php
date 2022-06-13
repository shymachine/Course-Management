<?php
include("session.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

if(isset($_GET['error'])) {
    $errormessage=$_GET['error'];
    echo "<script>alert('$errormessage');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
    <script type="text/javascript" src="js/login.js"></script>
    <link rel="stylesheet" type="text/css" href="css/cms.css">
    <title> User Dashboard | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
    <h2>User Dashboard</h2>
    <div class="container">
    <div class="row">
        <p><i>User:<?php echo $session_user; ?></i></p>
    </div>
    <br>
    <br>
    <nav class="navbar bg-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="unitDetails.php">Unit Details</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="StaffList.php">Staff List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="courseManagement.php">Course Management</a>
            </li>
            <li class="nav-item">
               <a id="managetutor" class="nav-link" href="managetutor.php">Tutor Management</a>
            </li>
            <li class="nav-item">
                <a id="studentlist" class="nav-link" href="StudentList.php">Student List</a>
            </li>
            <li class="nav-item">
                <a id="enrolledstudent" class="nav-link" href="enrolstudentlist.php">Enrolled Student List</a>
            </li>
            <li class="nav-item">
                <a id="managelecture" class="nav-link" href="managelecturer.php">Manage Unit</a>
            </li>
            <li class="nav-item">
                <a id="timetable" class="nav-link" href="timetable.php">Manage Lecture Time Table</a>
            </li>
            <li class="nav-item">
                <a id="studenttimetable" class="nav-link" href="studenttimetable.php">View Time Table</a>
            </li>
            <li class="nav-item">
                <a id="changepassword" class="nav-link" href="changepassword.php">Change Password</a>
            </li>
            <li class="nav-item">
                <a id="changerole" class="nav-link" href="changerole.php">Change Role</a>
            </li>
            <li class="nav-item">
                <a id="logout" class="nav-link" href="homePage.php">Logout</a>
            </li>
        </ul>
    </nav>
    </div>
</body>
</html>
