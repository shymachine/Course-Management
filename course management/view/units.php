<?php
    session_start();

    if(!(isset($_SESSION['username'])) || ($_SESSION['role'] != 'coordinator')) {
	die('ACCESS DENIED');
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <!--Required meta tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin=anonymous"> 
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/cms.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../controller/units1.js"></script>
    <title> University of Hope | Unit Management</title>
</head>
<body class="pt-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 fixed-top">
	<div class="container">
            <a href="cmshome.html" class="navbar-brand">University of Hope</a>
        </div>
    </nav>
    <div class="container mt-5 mb-5">
        <h2 class="float-sm-start">Unit Management</h2>
        <h2 class="float-sm-end"><?php echo($_SESSION['username']); ?> </h2>
    </div>
    <div class="table-responsive-sm">
	<table class="table table-striped" id="unitlist">
	<!--For table-->
        </table>
    </div> 
</body>
</html>
