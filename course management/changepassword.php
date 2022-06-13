<?php
include("db_conn.php");
include("session.php");

error_reporting(E_ALL);
ini_set('display_errors', 'on');

if($session_user === "") {
    header("Location: ./loggedPage.php?error=Sign in to access this page");
    return;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script type="text/javascript" src="js/passwd.js"></script>
    <link rel="stylesheet" type="text/css" href="css/cms.css">
    <title> Change Password | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
    <div class="container">
        <h2>Change Password</h2>
        <br>
        <br>
        <div class="row">
            <p><i>User:<?php echo $session_user; ?></i></p>
        </div>
        <br>
        <br>
        <br>

        <!--Change Password form-->
        <form id="changepassword" align="center"">
            <label class="form" for="passwd">Password:</label><br>
            <input type="password" id="passwd" name="passwd"><br><br>
            <label class="form" for="confirmpasswd">Confirm password:</label><br>
            <input type="password" id="confirmpasswd" name="confirmpasswd"><br><br>
            <button type="submit" id="submit" value="Submit">Change</button>
        </form>
        <br>
        <br>
        <br>
        <div class="row float-right">
           <a href="loggedPage.php" class="btn btn-info float-right">Back</a>
        </div>


        
    </div>
</body>
</html>
