<?php
include("db_conn.php");
include("session.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

if($session_user === "") {
    header("Location: ./homePage.php?error=Not signed in");
    return;
}

if($session_role !== "U_coordinator") {
    header("Location: ./loggedPage.php?error=Not a coordinator");
    return;
}
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
    <script type="text/javascript" src="js/jquery.tabledit.min.js"></script>
    <script type="text/javascript" src="js/jquery.tabledit.js"></script>   
    <script type="text/javascript" src="js/course.js"></script> 
    <title>Course Management | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
    <div class="container pt-5">
        <h2 style="text-align:center">Course Management</h2><br>
        <div class="row float-right">
            <p class="float-right"><i>User:<?php echo $session_user; ?></i></p>
        </div>
        <br>
        <br>
        <table class='table table-stripped' id="unitlist">
            <thead>
               <tr>
                   <th>ID</th>
                   <th>Unit Code</th>
                   <th>Unit Name</th>
                   <th>Unit Coordinator</th>
                   <th>Semester</th>
               </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM UNIT";
                    $res = $mysqli->query($query);
                    if(!$res) {
                        echo ("Error description:" .$mysqli->error);
                        $mysqli->close();
                        return;
                    }
                   
                    while($row = $res->fetch_array(MYSQLI_ASSOC))
                    {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['unit_code']."</td>";
                        echo "<td>".$row['unit_name']."</td>";
                        echo "<td>".$row['coordinator']."</td>";
                        echo "<td>".$row['semester']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
       <br> 
       <div class="row float-right">
           <a href="homePage.php" class="btn btn-info float-right">Back</a>
       </div>

        <form id="addunit">
        <div class="col">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#AddUnits" data-backdrop="static">Add Unit</button>
        </div>
            <div id="AddUnits" class="modal fade" role="dialog">
                <div class="modal-dialog" id="test">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Unit</h4>
                        </div>
                        <div class="modal-body">
                           <label for="unitcode">Unit Code</label><br>
                           <input class="form-control" type="text" id="unitCode"><br>
                           <label for="unitname">Unit Name</label><br>
                           <input class="form-control" type="text" id="unitName"><br>
                           <label for="lecturer">Unit Coordinator</label><br>
                           <input class="form-control" type="text" id="coordinator"><br>
                           <label for="semester">Semester</label><br>
                           <input class="form-control" type="text" id="semester"><br>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default float-left" id="Add">Add</button>
                            <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <br>
    <br>
    </div>
</body>
</html>
