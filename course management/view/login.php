<?php
    session_start();
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
    <link rel="stylesheet" type="text/css" href="../css/cms.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../controller/login.js"></script>    
    <title> University of Hope | Student Login Page</title>
</head>
<body class="pt-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 fixed-top">
    </nav>
    <!-- Login Form -->
    <div class="container">
	<h1 class="mb-5">University of Hope<h1>
	<h2 class="mb-3">Please Login</h2>
         <?php
             if(isset($_SESSION['error'])) {
             echo('<p style="color: red;">'.$_SESSION['error']."</p>\n");
             unset($_SESSION['error']);
	     }else {
	         if(isset($_SESSION['username'])) {
                     header("Location: dashboard.php");
		     return;
		 }
	     } 
        ?>
	<form id="login_form" method="post">
             <div class="row g-3 align-items-center mb-3">
	        <div class="col-sm-1">
	            <label for="name" class="form-label">Email Address</label>
		</div>
		<div class="col-sm-3">
		    <input type="text" name="username" id="name" class="form-control" required>
		    <div id="usernamehelp" class="form-text">University email address
		    </div>
		</div>
	    </div>
	    <div class="row g-3 align-items-center mb-3">
                <div class="col-sm-1">
		    <label for="password" class="form-label">Password</label>
	        </div> 
		<div class="col-sm-3">
		    <input type=password class="form-control" name="password" id="passwd" required>
		</div>
            </div>
	    <div class="row g-3 align-items-center mb-3">
	        <div class="col-sm-1">
		</div>
		<div class="col-sm-3">
                   <button type="submit" class="btn btn-primary" value="submit">Submit</button>
		</div>
	    </div>
	</form>
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
