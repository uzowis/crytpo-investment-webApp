<?php
//session_start();

// initializing variables

require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');
require('PHPMailer/src/Exception.php');

error_reporting(0);
//$user_id = $_SESSION['ref'];
$user    = "";
$email    = "";
$errors = array();

// connect to the database
include('config.php');

  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $user = mysqli_real_escape_string($db, $_POST['user']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $secret_q = mysqli_real_escape_string($db, $_POST['secret_q']);
  $secret_ans = mysqli_real_escape_string($db, $_POST['secret_ans']);
  $bit_wallet= mysqli_real_escape_string($db, $_POST['bit_wallet']);
  $pass = $_POST['pass'];
  $pass2 = $_POST['pass2'];
  $referred_user = $_POST['ref'];
  $date = date('Y-m-d');



// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $user = mysqli_real_escape_string($db, $_POST['user']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $secret_q = mysqli_real_escape_string($db, $_POST['secret_q']);
  $secret_ans = mysqli_real_escape_string($db, $_POST['secret_ans']);
  $bit_wallet= mysqli_real_escape_string($db, $_POST['bit_wallet']);
  $pass = $_POST['pass'];
  $pass2 = $_POST['pass2'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($user)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($pass)) { array_push($errors, "Password is required"); }
  if ($pass != $pass2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE user='$user' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user_result = mysqli_fetch_assoc($result);
  
  if ($user_result) { // if user exists
    if ($user_result['user'] === $user) {
      array_push($errors, "Username already exists");
    }

    if ($user_result['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$pass = md5($pass);//encrypt the password before saving in the database
	$date = date('Y-m-d');
	$date_time = date('Y-m-d H:i:s');
	
  	$query = "INSERT INTO users (fname, user, pass, email, otp, 2fa_enabled, secret_q, secret_ans, bit_wallet, reg_date) 
  			  VALUES('$fname', '$user', '$pass', '$email', '', '', '$secret_q', '$secret_ans', '$bit_wallet', '$date')";
	
	mysqli_query($db, $query);
	
	if(!empty($referred_user)){
		$sqlx = mysqli_query($db, "SELECT * FROM users WHERE user='$referred_user'");
		$queryxx = mysqli_num_rows($sqlx);
		$result = mysqli_fetch_assoc($sqlx);
		$user_id = $result['id'];
		if($queryxx == 1){
		$query2 = "INSERT INTO referral (user_id, fname, user, email, reg_date, currently_invested) 
  			  VALUES('$user_id','$fname', '$user', '$email', '$date', '')";
  	
		mysqli_query($db, $query2) or mysqli_error($db);	
		
		}
		
	}
	
	
	
	// Send an email notification to Admin Email
		
		$mailto="support@onedigitalassetshub.com";
		$subject="NEW REGISTRATION - ". $fname;
		
		$message ="A new User has signed Up to your platform, find the details below: \n";
		$message .="\n\n";
		$message .="Full Name: ". $fname ."\n";
		$message .="Username: ". $user ."\n";
		$message .="Email: ". $email ."\n";
		$headers = "From: One Digital Assets Hub <support@onedigitalassetshub.com>";
		mail($mailto, $subject, $message, $headers);
		
			
		
	// Send an email notification to User Email
		
		$mailto2=$email;
		$subject2="Digital Assets Successful Registration - ". $fname;
		
		$message2 ="Welcome to Digital Assets \n";
		$message2 .="\n\n";
		$message2 .="You have successfully registered an investment account with Digital Assets. Login to your account and make a deposit in a suitable investment package to start earning interests." ."\n";
		$message2 .="Regards,"."\n";
		$message2 .="Support Team"."\n";
		$headers2 = "From: One Digital Assets Hub <support@onedigitalassetshub.com>";
		mail($mailto2, $subject2, $message2, $headers2);
	
	$sql2 = "SELECT * FROM users WHERE user='$user'  AND email='$email'";
	$query2= mysqli_query($db, $sql2);
	while ($result1 = mysqli_fetch_assoc($query2)){
		$id= $result1['id'];
		$user = $result1['user'];
	}
	
	$sql3 = "INSERT INTO acct_details (user_id, currently_invested, available_bal, total_withdrawal, ref_bonus) 
			VALUES ('$id', '', '', '', '')";
	
	
	$sql4 = "INSERT INTO earnings (user_id, type, date, status, amount) 
			VALUES ('$id', '', '', '', '')";
	
	
	$sql5 = "INSERT INTO investment (user_id, plan, amount, status, date) 
			VALUES ('$id', '', '', '', '')";
	
	
	$sql6 = "INSERT INTO withdrawal (user_id, amount, status, date) 
			VALUES ('$id', '', '', '')";
	
	
	mysqli_query($db, $sql3);
//	mysqli_query($db, $sql4);
//	mysqli_query($db, $sql5);
	//mysqli_query($db, $sql6);
	
	
	
  	$_SESSION['user'] =$user;
	$_SESSION['success'] = "You are now logged in";
  	header('location: ./index.php');
  }
}


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
  	$query = mysqli_query($db, "SELECT * FROM users WHERE email='$email' AND pass='$pass'");
  	$rows1 = mysqli_num_rows($query);
  	$result = mysqli_fetch_array($query);

  	if ($rows1 > 0) {

  	    switch ($result['2fa_enabled']){

            case "no" :
                session_start();
                $_SESSION['id'] = $result['id'];
                $_SESSION['user'] = $result['user'];
                 //$_SESSION['email'] = $rows1['email'];
                $_SESSION['success'] = "You are now logged in";
                header('location: ./index.php');
                break;

            case "email" :
                // if 2FA is set to email, redirect to authentication page

                session_start();
                $_SESSION['email'] = $result['email'];

                $otp = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);

                function sendOtp($user_email, $newOtp){
                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                    $mail->isSMTP();
                    $mail->SMTPSecure = 'ssl';
                    $mail->SMTPAuth = true;
                    $mail->Host = 'wgh9.whogohost.com';
                    $mail->Port = 465;
                    $mail->Username = 'admin@onedigitalassetshub.com';
                    $mail->Password = 'A_l{)P@KgN)+';
                    $mail->setFrom('admin@onedigitalassetshub.com', "One Digital Assets Hub");
                    $mail->addAddress($user_email);
                    $mail->isHTML(true);
                    $message ="Hello,";
                    $message .="<br><br>";
                    $message .="<h3>Your Login Code is:</h3>";
                    $message .="<h1><b>".$newOtp."<b></h1>";
                    $message .="<br> Do not Share this code with anyone.<br><br>";
                    $message .="<a href='http://onedigitalassetshub.com/'> One Digital Assets Hub.</a>";
                    $mail->Subject = 'Your Login Code is '.$newOtp;
                    $mail->Body = $message;
                    //send the message, check for errors
                    if (!$mail->send()) {
                        echo "ERROR: " . $mail->ErrorInfo;
                    }

                }

                $email = $_SESSION['email'];

                //Send Email OTP
                sendOtp($email, $otp);

                mysqli_query($db, "UPDATE users SET otp = '$otp' WHERE email='$email'");

                header("Location: auth.php");
                break;

            default:
                ////// if 2FA is not set, redirect to User page

                session_start();
                $_SESSION['id'] = $result['id'];
                $_SESSION['user'] = $result['user'];
                $_SESSION['success'] = "You are now logged in";
                header('location: ./index.php');
                //$_SESSION['email'] = $rows1['email'];
                break;

        }


			
			

		
  	
	
	

  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>