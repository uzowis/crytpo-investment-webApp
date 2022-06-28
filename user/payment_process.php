<?php 

  session_start(); 
 // include('controllers/config.php');
  $id2 = $_SESSION['id'];
  $fname ="";
  $user ="";
  $email ="";
 //$user = $_SESSION['users'];
  
 
 if (isset($_POST['payment_btn'])){
	$amount =$_POST['amount'];
	$method =$_POST['method'];
	$btc_equiv =$_POST['btc_equiv'];
	$date = date('Y-m-d');
	
	
	include('controllers/config.php');
	$sqlx = "INSERT INTO deposit(user_id, date, amount, btc_equiv, method_of_payment, status ) 
				VALUES('$id2', '$date', '$amount', '$btc_equiv', '$method', 'Pending' )";
				
	$queryx = mysqli_query($db, $sqlx);
	if($queryx){
			// Send an email notification to Admin Email
			
		 $sql = "SELECT * FROM users WHERE id='$id2'";
         $result1 = mysqli_query($db, $sql);
        if(mysqli_num_rows($result1) == 1){
	        while($rows = mysqli_fetch_assoc($result1)){
    		  $fname = $rows['fname'];
    		  $user = $rows['user'];
    		  $email = $rows['email'];
		  
		  
	  }
  }
  
		$mailto="support@onedigitalassetshub.com";
		$subject="Deposit Notification ";
		
		$message ="A User made a Deposit, find the transaction details below for approval:";
		$message .="\n\n";
		$message .="Full Name: ". $fname ."\n";
		$message .="Username: ". $user ."\n";
		$message .="Email: ". $email ."\n";
		$message .="Amount To Deposit: ". "$".$amount .".00"."\n";
		$headers = "From: One Digital Assets Hub <support@onedigitalassetshub.com>";
		mail($mailto, $subject, $message, $headers);
		header('location: deposit_history.php');
		
	}else {echo 'failed to insert data'.mysqli_error($db);}
}
	

  if (!isset($_SESSION['user'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }  
  
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['user']);
  	header("location: login.php");
  }
?>

















