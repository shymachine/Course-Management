<?php
include("db_conn.php");
include("session.php");

error_reporting(E_ALL);
ini_set('display_errors', 'on');
    
if($session_user === "") {
    header("Location: ./loggedPage.php?error=Sign in to access this page");
    return;
}   
    
if($session_role !== "D_coordinator" AND $session_role !== 'U_coordinator') {
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
    <script type="text/javascript" src="js/managetutor.js"></script>
    <link rel="stylesheet" type="text/css" href="css/cms.css">
    <title> Tutor List | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
    <div class="container">
        <h2>Tutor List</h2>
        <br>
        <br>
        <div class="row float-right">
            <p class="float-right"><i>User:<?php echo $session_user; ?></i></p>
        </div>
        <br>
        <br> 
        <table id="table11" class="table">
            <thead>
                 <tr>
                     <th>ID</th>
                     <th>Staff ID</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Unit Code</th>
                     <th>Unit Name</th>
                     <th>Campus</th>
                 </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM TUTOR";
                    $res = $mysqli->query($query);
                    if(!$res) {
                        echo("Error description:" .$mysqli->error);
                        $mysqli->close();
                        return;
                    }

                    while($row = $res->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['staff_id']."</td>";
                        echo "<td>".$row['first_name']."</td>";
                        echo "<td>".$row['last_name']."</td>";
                        echo "<td>".$row['unit_code']."</td>";
                        echo "<td>".$row['unit_name']."</td>";
                        echo "<td>".$row['campus']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <br>
        <br> 
        <div class="row float-right">
           <a href="loggedPage.php" class="btn btn-info float-right">Back</a>
        </div>

        <form id="addtutor">
        <div class="col">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#AddTutor" data-backdrop="static">Add Tutor</button>
        </div>
            <div id="AddTutor" class="modal fade" role="dialog">
                <div class="modal-dialog" id="test">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Tutor</h4>
                        </div>
                        <div class="modal-body">
                           <label for="staffid">Staff ID</label><br>
                           <input class="form-control" type="text" id="staffid"><br> 
                           <label for="fname">First Name</label><br>
                           <input class="form-control" type="text" id="fname"><br>
                           <label for="lname">Last Name</label><br>
                           <input class="form-control" type="text" id="lname"><br> 
                           <label for="unitcode">Unit Code</label><br>
                           <input class="form-control" type="text" id="unitcode"><br>
                           <label for="unitname">Unit Name</label><br>
                           <input class="form-control" type="text" id="unitname"><br>
                           <label for="campus">Campus</label><br>
                           <input class="form-control" type="text" id="campus"><br>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default float-left" id="Add">Add</button>
                            <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
