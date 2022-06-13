//Database login
<?php
session_start();

require_once('connect_to_db.php');

//User logins
if(ISSET($_POST['username']) && ISSET($_POST['password'])) {

    //validate inputs
    if(strlen($_POST['username']) == 0) {
	 $_SESSION['error']="Email Address is mandatory!";
         header("Location: ../view/login.php");
         return;
    }

    if(strlen($_POST['password']) == 0) {
	$_SESSION['error'] = "Password is mandatory!";
        $pdo = null;
	header("Location: ../view/login.php");
	return;
    }

    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);


    $stmt = $pdo->prepare("SELECT COUNT(*) FROM USERS WHERE user_id=:user_name");
    $stmt->execute(array(':user_name' => $username));

    $numofrows = $stmt->fetchColumn();

    if($numofrows == 0 || $numofrows > 1) {
	error_log("Zero or more than one user with username ".$username);
        $_SESSION['error'] = "Invalid user name";
        $pdo = null;
	header("Location: ../view/login.php");
	return;
    }else {
        //for now check password as plain text
	$stmt = $pdo->prepare("SELECT * FROM USERS WHERE user_id=:user_name");
	$stmt->execute(array(':user_name' => $username));
	$data = $stmt->fetch();

	if($data['password'] == $password) {
	    $_SESSION['username'] = $username;
            $_SESSION['role'] = $data['role'];
	    $pdo = null;
            header("Location: ../view/dashboard.php?successful login");
	    return;
	} else {
	     //wrong password
	     $_SESSION['error']="Invalid password";
	     $pdo = null;
	     header("Location: ../view/login.php?wrong password");
	     return;
	}
    }
}
?>
