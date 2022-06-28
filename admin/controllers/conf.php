<?php
//session_start();

// initializing variables


//error_reporting(0);
//$user_id = $_SESSION['ref'];
$user    = "";
$email    = "";
$errors = array(); 

// connect to the database
include('config.php');


  

// LOGIN USER
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pass = mysqli_real_escape_string($db, $_POST['pass']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($pass)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$pass = md5($pass);
  	$query = "SELECT * FROM admin WHERE email='$email' AND pass='$pass'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) > 0) {
		while($rows1 = mysqli_fetch_array($results)){
		
			session_start();
			$_SESSION['id'] = $rows1['id'];
			$_SESSION['admin'] = $rows1['uname'];
			//$_SESSION['email'] = $rows1['email'];
			
			
			
		}
		
  	
	
	
	 $_SESSION['success'] = "You are now logged in";
  	  header('location: ./index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>