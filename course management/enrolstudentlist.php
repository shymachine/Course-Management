<?php
include("db_conn.php");
include("session.php");

error_reporting(E_ALL);
ini_set('display_errors', 'on');

if($session_user === "") {
    header("Location: ./loggedPage.php?error=Sign in to access this page");
    return;
}

//Student list can be view by teaching staff including tutor
if($session_role === "student") {
    header("Location: ./loggedPage.php?error=Not a teaching staff");
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
    <link rel="stylesheet" type="text/css" href="css/cms.css">
    <title> Student Master List | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
    <div class="container">
        <h2 align ="center">Student Enrolled in a unit</h2><br>
        <div>
            <p><i>User:<?php echo $session_user; ?></i></p>
        </div>
        <br>
        <br>
        <br>
        <form id="studentenrolform" method="post" action="studentonaunit.php">
            <div class="row">
                <div class="col">
                    <select id="unit" name="unit">
                        <?php
                            $sqlQuery = "SELECT * FROM UNIT";
                            $res = $mysqli->query($sqlQuery);
                            if(!$res) {
                                echo("Error description:" .$mysqli->error);
                                $res->free();
                                $mysqli->close();
                                return;
                            }else {
                                while($row = $res->fetch_array(MYSQLI_ASSOC)) {
                                    $unitname = $row['unit_code']."  ". $row['unit_name'];
                                    echo "<option value=".$row['unit_code'].">".$unitname."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col">
                    <button id="enrollist" type="submit">Submit</button>
                </div>
            </div>

        </form>
        <br>
        <br>
        <br>

        <div class="row">
           <div class="col">
               <a href="loggedPage.php" class="btn btn-info">Back</a>
           </div>
       </div>

    </div>
</body>
</html>
