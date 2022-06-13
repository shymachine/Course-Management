<?php
include("db_conn.php");
include("session.php");

error_reporting(E_ALL);
ini_set('display_errors', 'on');

if($session_user === "") {
    header("Location: ./loggedPage.php?error=Not signed in");
    return;
}

if($session_role !== 'U_coordinator') {
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
    <script type="text/javascript" src="js/lecturer.js"></script> 
    <title>Unit Management | University of Dowell</title>
</head>
<body background="img/cmsbackground.png">
</body>
    <div class="container pt-5">
       <p><i>User:<?php echo $session_user; ?></i></p>
       <br>
       <br>
       <table class='table table-stripped' id="lecturerlist">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Unit Code</th>
                   <th>Unit Name</th>
                   <th>Campus</th>
                   <th>Lecturer</th>
               </tr>
           </thead>
           <tbody>
               <?php
                   $query = "SELECT * FROM CAMPUS_UNIT";
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
                       echo "<td>".$row['campus']."</td>";
                       echo "<td>".$row['lecturer']."</td>";
                   }
               ?>
           </tbody>
       </table>
        <div class="row float-right">
           <a href="loggedPage.php" class="btn btn-info float-right">Back</a>
        </div>
    </div>
</html>

