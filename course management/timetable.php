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
    header("Location: ./loggedPage.php?error=Sign in as coordinator");
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
    <script type="text/javascript" src="js/timetable.js"></script>
    <script type="text/javascript" src="js/jquery.tabledit.min.js"></script>
    <script type="text/javascript" src="js/jquery.tabledit.js"></script> 
    <link rel="stylesheet" type="text/css" href="css/cms.css">
    <title> Time Table | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
    <div class ="container">
        <h2 align ="center">Lecture Time Table</h2><br>
        <h4 align ="center">Master of Information Technology and System</h4><br>
        <br>
        <div class="row">
            <p><i>User:<?php echo $session_user; ?></i></p>
        </div>
        <br>
        <br>
        <table class='table table-stripped' id="timetable1">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>9AM-11AM</th>
                    <th>11AM-1PM</th>
                    <th>1PM-3PM</th>
                    <th>3PM-5PM</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM LECTURE_TIME";
                    $res = $mysqli->query($query);
                    if(!$res) {
                        echo ("Error description:" .$mysqli->error);
                        $mysqli->close();
                        return;
                    }
                    while($row = $res->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$row['day']."</td>";
                        echo "<td>".$row['Nine_Eleven']."</td>";
                        echo "<td>".$row['Eleven_One']."</td>";
                        echo "<td>".$row['One_Three']."</td>";
                        echo "<td>".$row['Three_Five']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <div class="row float-right">
           <a href="loggedPage.php" class="btn btn-info float-right">Back</a>
        </div>

    </div>
</body>
</html>
