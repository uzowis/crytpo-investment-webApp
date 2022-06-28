<?php
session_start();

$user    = "";
$email    = "";
$errors = array(); 
include('config.php'); 
include('errors.php');
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
  	$query = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['user'] = $user;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: ./index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>