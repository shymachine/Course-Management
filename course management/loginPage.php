<?php
include("session.php");


if(isset($_GET['error']))
{   
    $errormessage=$_GET['error'];
 echo "<script>alert('$errormessage');</script>";
}
?>
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
    <title> Login | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
    <form id="login" action="sign_in.php" method="post">
        <br>
        <br>
        <div class="container pt-5">
            <div class="row text-center">
                <label for="uname"><b>Username<b></label>
                <input type="text" placeholder="Enter Username" name="uname" id="uname">
            </div>
            
            <div class="row text-center">
                <label for="psw"><b>Password<b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="passwd">
            </div>
            <div class="row text-center">
                <button id="submit" type="submit"">Login</button>
            </div>
            <br>
            <br>
            <div class="row text-center">
                <a href="homePage.php" class="btn btn-info float-right">Back</a>
            </div>

        </div>
    </form>
</body>
</html>
