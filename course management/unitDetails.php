<?php
include("db_conn.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');
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
    <script type="text/javascript" src="js/unitDetails.js"></script>
    <title>Unit Details | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
    <div class="container pt-5"> 
       <form id="unitdetail" method="post" action="printUnitDetail.php">
           <h2>Units Guide</h2>
           <div class="form-group row">
               <div class="col-xs-3"> 
                   <select class="form-control" id="courselist">
                       <option value="Info">Select Course</option>
                       <option value="MITS">Master of Information Technology and Systems</option>
                   </select>
               </div>
           </div>
           <div class="form-group row">
               <div class="col-xs-3">
                    <select class="form-control" id="course" name="course">
                       <option value="Info">Select Unit</option>
                       <?php
                           $query = "SELECT * FROM UNIT";
                           $res = $mysqli->query($query);
                           if(!$res) {
                               echo("Error description:" .$mysqli->error);
                               $mysqli->close();
                               return;
                           } else {
                              while($row = $res->fetch_array(MYSQLI_ASSOC)) {
                                  $unitname = $row['unit_code']."  ". $row['unit_name'];
                                  echo "<option value=".$row['unit_code'].">".$unitname."</option>";

                              }
                           }
                           $mysqli->close();
                           echo "</select>";
                       ?>
               </div>
           </div>
           <div class="form-group row">
               <div class="col-xs-3">
                   <button id="printdetail" type="submit">Detail</button>
               </div>
           </div>
       </form>
       <div class="row">
           <div class="col-xs-3">
               <a href="homePage.php" class="btn btn-info">Back</a>
           </div>
       </div>
    </div>
</body>
</html>
