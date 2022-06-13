<?php
include("db_conn.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');
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
    <script type="text/javascript" src="js/unitDetails.js"></script>
    <title>Unit Details | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
    <?php
        $unit = $_POST['course'];

        $query = "SELECT * FROM UNIT JOIN CAMPUS_UNIT ON UNIT.unit_code=CAMPUS_UNIT.unit_code WHERE UNIT.unit_code='$unit'";
        $res = $mysqli->query($query);
        if(!$res) {
            echo ("Error description:" .$mysqli->error);
            $mysqli->close();
            return;
        }
        $row = $res->fetch_array(MYSQLI_ASSOC);
    ?>
<div class="container">
<br>
<br>
<br>
    <h4 style="text-align:center"><b>Unit Description<b></h4><br>
<?php
    $unitname = $row['unit_name'];
    echo "<h5>Unit Name: " .$row['unit_code']."  ".$row['unit_name']."</h5><br>";
    echo "<p><b>Unit Coordinator: Prof. ".$row['coordinator']."</p><br>";
    echo "  <p><b>Unit Description</b></p><br>";
    echo $row['description']. "<br>";
    echo "<br>"; 
?>
<table id="unittable" class="table table-striped">
    <thead>
        <tr>
             <div class="col">
                 <th>Lecturer</th>
             </div>
             <div class="col">
                 <th>Semester</th>
             </div>
             <div class="col">
                <th>Location</th>
             </div>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
                echo "<td>".$row['lecturer']."</td>";
                echo "<td>".$row['semester']."</td>";
                echo "<td>".$row['campus']."</td>";
            ?>
        </tr>
    </tbody>
</table>
<br>
<br>
<br>
<div class="row">
    <div class="col">
        <a href="unitDetails.php" class="btn btn-info">Back</a>
    </div>
    <div class="col">
        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#enrol">Enrol</button>
    </div>
</div>

<form id="enrolform" onsubmit="return false">
    <div id="enrol" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Unit Enrolment Form</h4>
                </div>
                <div class="modal-body">
                    <label for="unitcode">Unit Code</label><br>
                    <input class="form-control" type="text" id="unitCode" value="<?php echo $unit;?>"><br>
                    <label for="unitname">Unit Name</label><br>
                    <input class="form-control" type="text" id="unitName" value=" <?php echo $unitname; ?> " ><br>
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
