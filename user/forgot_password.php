<?php include('controllers/conf.php');
$err = ''; 
$success ="";
$new_pass ="";
if(isset($_POST['recover'])){
	$email =$_POST['email'];
	$sql = mysqli_query($db, "SELECT email FROM users WHERE email='$email'");
	$result = mysqli_num_rows($sql);
	if ($result == 1){
		
		$salt = 'pass'.rand(2341000, 98400000);
		$new_pass = md5($salt);
		$run=mysqli_query($db, "UPDATE users SET pass='$new_pass' WHERE email='$email'");
		if($run){
			$sql2 = mysqli_query($db, "SELECT * FROM users WHERE email='$email'");
			$result2 = mysqli_fetch_assoc($sql2);
			$email =$result2['email'];
			
			// Send an email notification to User Email
		
		$mailto2=$email;
		$subject2="Password Recovery";
		
		$message2 ="Password Recovery \n";
		$message2 .="\n\n";
		$message2 .="Kindly Find your new login details below" ."\n";
		$message2 .="Email: " .$email."\n";
		$message2 .="New Password: " .$salt."\n";
		$message2 .="URL: " ."https://onedigitalassetshub.com/user/login.php"."\n";
		$message2 .="\n";
		$message2 .="Use the above details to Login to your account and update the password to choice from Profile Page."."\n";
		$message2 .="Regards,"."\n";
		$message2 .="Support Team"."\n";
		$headers2 = "From: One Digital Assets Hub <support@onedigitalassetshub.com>";
		mail($mailto2, $subject2, $message2, $headers2);
		
		$success ="Password Reset was Successful, kindly Check your Email for new Password";	
		
		
	}
	
}else{
		$err = 'No account associated with this Email';
	}
}


?>


<!DOCTYPE html>
<html>


<head>
    <title>Login | Digital Asset Hub  - Systematic Cryptocurrency trading platform</title>
<meta charset="utf-8">
<meta content="ie=edge" http-equiv="x-ua-compatible">

<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="../../coinspotraders.com/wp-content/uploads/fevicon.html" rel="shortcut icon">
<link href="../../coinspotraders.com/wp-content/uploads/fevicon.html" rel="apple-touch-icon">
<link href="../../coinspotraders.com/fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.html" rel="stylesheet" type="text/css">
<link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
<link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
<link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
<link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
<link href="css/maince5a-version%3d1589666627.css" rel="stylesheet">
</head>
<body class="auth-wrapper color-scheme-dark">
<div class="all-wrapper with-pattern">
        <div class="auth-box-w" style=" background-color: transparent;">
    <div class="element-wrapper">
        <div class="element-box" style=" min-height: 550px;">
<div class="logo-w" style="padding:2% !important">
<a href="#">
    <img alt="" src="../image/logo.png" style="max-width: 200px;">
</a>
</div>
<h4 class="auth-header">Recover Password</h4>
<form action="forgot_password.php" method="POST" style="padding-bottom:2px !important">
<?php include('controllers/errors.php'); ?>
<div class="form-group">
<?php if ($err) {?>
<p style="color: red; "><?php echo $err; ?></p>	
<?php }elseif($success){?>
<p style="color: green; "><?php echo $success; ?></p>	
<?php }?>


							 
<label for="">Email</label>
<input id="exampleuser1" type="email" placeholder="Email" name="email" class="form-control" required="">

<div class="pre-icon os-icon os-icon-user-male-circle">
</div>

</div>

<br>
<input type="submit" value="Recover" name="recover" class="btn btn-success">  
</div>

</form>

</div>
        </div>
    </div>
    
    
</div>
 <script src="bower_components/jquery/dist/jquery.min.js">
</script>
<script src="bower_components/popper.js/dist/umd/popper.min.js">
</script>
<script src="bower_components/moment/moment.js">
</script>
<script src="bower_components/chart.js/dist/Chart.min.js">
</script>
<script src="bower_components/select2/dist/js/select2.full.min.js">
</script>
<script src="bower_components/jquery-bar-rating/dist/jquery.barrating.min.js">
</script>
<script src="bower_components/ckeditor/ckeditor.js">
</script>
<script src="bower_components/bootstrap-validator/dist/validator.min.js">
</script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js">
</script>
<script src="bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js">
</script>
<script src="bower_components/dropzone/dist/dropzone.js">
</script>
<script src="bower_components/editable-table/mindmup-editabletable.js">
</script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js">
</script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js">
</script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js">
</script>
<script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js">
</script>
<script src="bower_components/tether/dist/js/tether.min.js">
</script>
<script src="bower_components/slick-carousel/slick/slick.min.js">
</script>
<script src="bower_components/bootstrap/js/dist/util.js">
</script>
<script src="bower_components/bootstrap/js/dist/alert.js">
</script>
<script src="bower_components/bootstrap/js/dist/button.js">
</script>
<script src="bower_components/bootstrap/js/dist/carousel.js">
</script>
<script src="bower_components/bootstrap/js/dist/collapse.js">
</script>
<script src="bower_components/bootstrap/js/dist/dropdown.js">
</script>
<script src="bower_components/bootstrap/js/dist/modal.js">
</script>
<script src="bower_components/bootstrap/js/dist/tab.js">
</script>
<script src="bower_components/bootstrap/js/dist/tooltip.js">
</script>
<script src="bower_components/bootstrap/js/dist/popover.js">
</script>
<script src="js/demo_customizerce5a-version%3d4.4.1.js">
</script>   
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        
      <div class="modal-header">
        
        <h4 class="modal-title">Recover Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <form action="#" method="post"> 
       
      <div class="form-group has-feedback">
          <input type="text" name="email" required="" class="form-control" placeholder="Type your account email">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
        
   
                       
         <input type="hidden" name="action" value="recover"/>
        <div class="form-group has-feedback"> 
      <div class="row">

        
        <div class="col-md-4">
            <input type="hidden" name="action" value="recover"/>
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </div>
     
      </div>
      </div>
    </form>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </div>
      
    </div>

  </div>
    <script>
  var offset = new Date().getTimezoneOffset()*60;
console.log("Offset is: "+offset);  
    </script>
    <script type='text/javascript' src='../tawto.html'></script>
</body>

</html>
