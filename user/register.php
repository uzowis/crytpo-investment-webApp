<?php include('controllers/conf.php'); ?>
<!DOCTYPE html>
<html>

<!-- Mirrored from primedividends.com/user/register by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 May 2020 16:55:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>Register | Digital Asset Hub  - Systematic Cryptocurrency trading platform</title>
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
<link href="css/maince5a-version%3d1589666624.css" rel="stylesheet">
</head>
<body class="color-scheme-dark">

<div class="all-wrapper menu-side with-pattern">
    

    
    
    
<div class="auth-box-w wider" style="min-width: 50% !important; background-color: transparent;">
    <div class="element-wrapper">
<div class="element-box">
    
        <div class="logo-w" style="padding: 50px;">
<a href="https://primedividends.com/index">
    <img alt="" src="../image/logo.png" style="max-width: 200px;">
</a>
</div>
<h4 class="auth-header">Create new account</h4>
<form action="register.php" method="POST">
<?php include('controllers/errors.php'); ?>
        <div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for=""> Full name</label>
<input class="form-control" type="text" name="fname" placeholder="Enter Full Name" required="">
<div class="pre-icon os-icon os-icon-user-male-circle">
</div>
</div>
</div>

</div>
    
    
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for=""> Email Address</label>
<input class="form-control" type="email" name="email" placeholder="Enter Email" required="">
<div class="pre-icon os-icon os-icon-email-2-at">
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for=""> Username</label>
<input class="form-control" type="text" name="user" placeholder="Enter Username" required="">

</div>
</div>

</div>

   <?php error_reporting(0); if ($_GET['ref'] != '') {?>
   <input type="hidden" name="ref" value="<?php $referred_user = $_GET['ref']; echo $referred_user;?>" placeholder="Confirm Password" >
   <?php }else {}?>
	<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for=""> Password</label>
<input class="form-control" type="password" name="pass" placeholder="Password" required="">
<div class="pre-icon os-icon os-icon-fingerprint">
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="">Confirm Password</label>
<input class="form-control" type="password" name="pass2" placeholder="Confirm Password" required="">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for=""> Secret Question</label>
<input class="form-control" type="text" name="secret_q" placeholder="Enter Secret Question" required="">
<div class="pre-icon os-icon os-icon-book">
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="">Secret Answer</label>
<input class="form-control" type="text" name="secret_ans" placeholder="Enter Answer" required=""> 
</div>
</div>
</div>
    
    <div class="form-group">
<label for="">Bitcoin Wallet Address</label>
<input class="form-control" type="text" name="bit_wallet" placeholder="Enter your Bitcoin Wallet Address">
<div class="pre-icon os-icon os-icon-wallet-loaded">
</div>
</div>
<div class="buttons-w">
    
 <button type="submit" name="register" class="btn btn-danger">Register Now</button>
 <a href="login.php" class="pull-right">Member Login</a>
</div>
</form>

</div>
   </div>
</div> 
    
    
</div>
    
        
        <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script src="//code.tidio.co/680shwbtck0najdxate9pcanyedxxz6m.js" async></script>
</body>
<!-- Mirrored from light.pinsupreme.com/auth_register by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Oct 2019 01:11:26 GMT -->

<!-- Mirrored from primedividends.com/user/register by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 May 2020 16:55:36 GMT -->
</html>
