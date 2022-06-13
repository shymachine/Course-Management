<?php
include("db_conn.php");
include("session.php");

error_reporting(E_ALL);
ini_set('display_errors', 'on');

if($session_user === "") {
    header("Location: ./loggedPage.php?error=Sign in to access this page");
    return;
}

if($session_role !== 'D_coordinator') {
    header("Location: ./loggedPage.php?error=Sign in as a degree coordinator");
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
    <script type="text/javascript" src="js/changerole.js"></script>
    <script type="text/javascript" src="js/jquery.tabledit.min.js"></script>
    <script type="text/javascript" src="js/jquery.tabledit.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/cms.css">
    <title> User List | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
    <div class ="container">
        <h2 align ="center">Change User Role</h2><br>
        <br>
        <div class="row">
             <p><i>User:<?php echo $session_user; ?></i></p>
        </div>
        <br>
        <br>
        <table class='table table-stripped' id="usertable">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM USERDB";
                    $res = $mysqli->query($query);
                    if(!$res) {
                        echo ("Error description:" .$mysqli->error);
                        $mysqli->close();
                        return;
                    }

                    while($row = $res->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$row['userid']."</td>";
                        echo "<td>".$row['role']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
       <div class="row">
           <div class="col-xs-3">
               <a href="loggedPage.php" class="btn btn-info">Back</a>
           </div>
       </div>
    </div>
</body>
</html>
