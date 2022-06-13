<?php
    session_start();

    if(!isset($_SESSION['username'])){
	die('ACCESS DENIED');
    }

    $cookie_name = 'user';
    setcookie($cookie_name, $_SESSION['username']);
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
    <script type="text/javascript" src="../controller/dashboard.js"></script>
<title> University of Hope | <?php echo($_SESSION['role']); ?> Login Page</title>
</head>
<body class="pt-5">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 fixed-top">
<div class="container">
    <a href="cmshome.html" class="navbar-brand">University of Hope</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=#dashboard>
          <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="dashboard">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="units.php">Units</a>
	    </li>
	    <li class="nav-item">
                <a class="nav-link" href="#">Add Student</a>
	    </li>
	    <li class="nav-item">
                <a class="nav-link" href="#">Add Tutor/Lecturer</a>
	    </li>
	    <li class="nav-item">
                <a class="nav-link" href="#">Schedule Lecture</a>
	    </li>
	    <li class="nav-item">
                <a class="nav-link" href="#">Schedule Tutorial</a>
            </li>
        </ul>
	<ul class="navbar-nav ms-auto">
	    <li class="nav-item">
		 <a href="cmshome.html" class="nav-link" id="dashboard_signout";>
		 <i class="fa fa-sign-out-alt" style=""></i>
		 Signout</a>
	    </li>
	</ul>
    </div>
</div>
</nav>
<div class="container mt-5">
<h2 class="float-sm-start"><?php echo($_SESSION['role']); ?> Dashboard</h2>
<h2 class="float-sm-end"><?php echo($_SESSION['username']); ?> </h2>
</div>
<div>
<?php

    if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
</div>

    <!-- Footer -->
    <footer class="p-3 bg-dark text-white text-center fixed-bottom">
    <div class="container">
        <p class="lead">Copyright &copy; University of Hope</p>
    </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
				 crossorigin="anonymous">
    </script>

</body>
</html>

