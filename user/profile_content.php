<?php include('controllers/config.php');

$query5 = mysqli_query($db, "SELECT * FROM users WHERE id='$id2'");
$result5 = mysqli_num_rows($query5);
$details5 = mysqli_fetch_assoc($query5);

$err_pass ='';
$update_pass_success ='';
$wallet_success ='';
$two_fa_success ='';
if(isset($_POST['update']) && !empty($_POST['password']) && !empty($_POST['cpassword']) ){
	$pass = $_POST['password'];
	
	$cpass = $_POST['cpassword'];
	$pass2 = md5($pass);
	
	if($pass!=$cpass){
		$err_pass = 'Password does not Match';
	}else {
		mysqli_query($db, "UPDATE users SET pass='$pass2' WHERE id='$id2'");
			$update_pass_success = 'Password Successfully Updated';
		
		
	}
}

if(isset($_POST['update_wallet']) && !empty($_POST['wallet']) ){
	$btc_wallet = $_POST['wallet'];
	
		mysqli_query($db, "UPDATE users SET bit_wallet='$btc_wallet' WHERE id='$id2'");
			$wallet_success = 'Btc Wallet Successfully Updated';
			
		
		
	}

	// Activate or deactivate Two-Factor Authentication
if(isset($_POST['send'])){
    $option = $_POST['2fa_enabled'];
    $email = $_POST['email'];

    $query = mysqli_query($db, "UPDATE users SET 2fa_enabled = '$option' WHERE email ='$email'");
    $two_fa_success = "Update Saved";
}




 ?>
<div class="content-i">
<div class="content-box">
<div class="row">
<div class="col-sm-5">
<div class="user-profile compact">
<div class="up-head-w" style="background-image:url(img/profile2.png)">
<div class="up-social">
<a href="#">
<i class="os-icon os-icon-twitter">
</i>
</a>
<a href="#">
<i class="os-icon os-icon-facebook">
</i>
</a>
</div>
<div class="up-main-info">
<h2 class="up-header"><?php echo $fname; ?></h2>
<h6 class="up-sub-header"><?php echo $user;?></h6>
</div>
<svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
<path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z">
</path>
</g>
</svg>
</div>
<div class="up-controls">
<div class="row">
<div class="col-sm-6">
<div class="value-pair">
<div class="label">Status:</div>
<div class="value badge badge-pill badge-success">Online</div>
</div>
</div>
<div class="col-sm-6 text-right">
    <a class="btn btn-danger btn-sm" href="index.php?logout='1'">
<i class="os-icon os-icon-log-out">
</i>
<span>Logout</span>
</a>
</div>
</div>
</div>
<?php 
$query3 = mysqli_query($db, "SELECT * FROM deposit WHERE user_id='$id2' ");
$result3 = mysqli_num_rows($query3);

?> 
<div class="up-contents">
<div class="m-b">
<div class="row m-b">
<div class="col-sm-6 b-r b-b">
<div class="el-tablo centered padded-v">
<div class="value"><?php echo $result3; ?></div>
<div class="label">Transactions</div>
</div>
</div>


<?php 
$query4 = mysqli_query($db, "SELECT * FROM acct_details WHERE user_id='$id2' ");
$result4 = mysqli_num_rows($query4);
$details4 = mysqli_fetch_assoc($query4);

?> 

<div class="col-sm-6 b-b">
<div class="el-tablo centered padded-v">
<div class="value"><?php if($details4['currently_invested']<=0){echo '$0.00' ;}else {echo '$'.$details4['currently_invested'];}?></div>
<div class="label">Invested</div>
</div>
</div>
</div>
<div class="padded">

<div class='widget white-bg friends-group clearfix'>
							<small class="text-muted">Email address </small>
                            <p><strong><?php echo $details5['email']?></strong></p> 
							<small class="text-muted">Reg. Date</small>
                            <p><strong><?php echo $details5['reg_date']; ?></strong></p> 
							<small class="text-muted">Bitcoin Wallet</small>
                            <p><strong><?php echo $details5['bit_wallet'] ;?></strong></p>
                              
			<small class="text-muted">Referral Link</small>
                          <strong><p>http://onedigitalassetshub.com/user/register?ref=<?php echo $details5['user'] ;?></p></strong>
                            <br>

                     
                    </div>    
    
</div>
</div>
</div>
</div>

</div>
<div class="col-sm-7">
<div class="element-wrapper">
<div class="element-box">
    
    <form action="profile.php" method="POST">
<div class="element-info">
<div class="element-info-with-icon">
<div class="element-info-icon">
<div class="os-icon os-icon-ui-09">
</div>
</div>
<div class="element-info-text">
<h5 class="element-inner-header">Change Password</h5>
<div class="element-inner-desc">To change your password, kindly enter a new password then confirm the password. You are advised to chose a very strong password
</div>
</div>
    
</div>
    
</div>
       
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for=""> Password</label>
<input class="form-control" data-minlength="8" id="NewPassword" placeholder="New Password" required="" name="password" minlength="8" maxlength="25" type="password">
<div class="help-block form-text text-muted form-control-feedback">Minimum of 8 characters</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="">Confirm Password</label>
<input class="form-control" placeholder="Confirm Password" required="required" type="password" name="cpassword">
<div class="help-block form-text with-errors form-control-feedback">
</div>
</div>
</div>
</div>
 <?php echo $err_pass.$update_pass_success .'<br>';?> 
<div class="form-buttons-w">
<button class="btn btn-primary" name="update" type="submit"> Submit</button>
</div>
</form>
</div>
</div>

<! ---- 2 FACTOR AUTHENTICATION -->
<div class="element-wrapper">
<div class="element-box">
<form action="profile.php" method="POST">
<div class="element-info">
<div class="element-info-with-icon">
<div class="element-info-icon">
<div class="os-icon os-icon-ui-09">
</div>
</div>
<div class="element-info-text">
<h5 class="element-inner-header">2 - Step Verification</h5>

</div>
</div>
</div>
<div class="row">
      <div class="col-sm-12">
<div class="form-group">
<label for=""> 2FA Enabled: </label>
<select class="form-control" name="2fa_enabled">
	<option value="no" <?php if($details5['2fa_enabled'] !== 'email'){echo 'selected'; }?>>No</option>
	<option value="email" <?php if($details5['2fa_enabled'] === 'email'){echo 'selected'; }?>>Yes</option>
</select>
<input type="hidden" name="email" value=<?php echo $details5['email'];?>>

</div>
</div>

</div>

    
    
 <?php echo $two_fa_success .'<br>';?> 
<div class="form-buttons-w">
<button name="send" class="btn btn-primary" type="submit"> Submit</button>
</div>
</form>
</div>
</div>  

    
 <div class="element-wrapper">
<div class="element-box">
<form action="profile.php" method="POST">
<div class="element-info">
<div class="element-info-with-icon">
<div class="element-info-icon">
<div class="os-icon os-icon-wallet-loaded">
</div>
</div>
<div class="element-info-text">
<h5 class="element-inner-header">Change Wallet</h5>

</div>
</div>
</div>
<div class="row">
      <div class="col-sm-12">
<div class="form-group">
<label for=""> Bitcoin Wallet</label>
<input class="form-control" name="wallet" type="text" value=<?php echo $details5['bit_wallet']; ?>>

</div>
</div>

</div>

    
    
 <?php echo $wallet_success .'<br>';?> 
<div class="form-buttons-w">
<button name="update_wallet" class="btn btn-primary" type="submit"> Submit</button>
</div>
</form>
</div>
</div>  

 
</div>

</div>



</div>

</div>