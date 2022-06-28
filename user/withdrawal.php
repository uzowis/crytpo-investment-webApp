<?php 

  session_start(); 
  include('controllers/config.php');
  $id2 = $_SESSION['id'];
 //$user = $_SESSION['users'];
 
 
 
  
  $withdrawal_amount ='';
  $available_bal ='';
  $date_of_withdrawal = date('Y-m-d');
  $err_insuficient_fund ='';
  $err_invalid_amount ='';
  
  if(isset($_POST['withdraw_btn'])){
	  $withdrawal_amount = $_POST['amount'];
	  $id = $id2;
	  
	  
	  $sqly = "SELECT * FROM acct_details WHERE id='$id2'";
	  $resulty = mysqli_query($db, $sqly);
	  $rowy = mysqli_fetch_assoc($resulty);
	  $available_bal = $rowy['available_bal'];
	  
	  if($withdrawal_amount <= 0){
		  $err_invalid_amount = 'Enter a valid amount';
	  }elseif($withdrawal_amount > $available_bal){
		  $err_insuficient_fund = 'Insuficient Fund';
	  }else {
		  $sqlx = "INSERT INTO withdrawal(user_id, amount, status, date ) VALUES('$id2', '$withdrawal_amount', 'Pending', '$date_of_withdrawal') ";
		  $resultx = mysqli_query($db, $sqlx);
		  if($resultx){
		  $sql = "SELECT * FROM users WHERE id='$id2'";
              $result1 = mysqli_query($db, $sql);
              if(mysqli_num_rows($result1) == 1){
            	  while($rows = mysqli_fetch_assoc($result1)){
            		  $fname = $rows['fname'];
            		  $user = $rows['user'];
            		  $email = $rows['email'];
		  
		  
	  }
  }     
		 
		// Send an email notification to Admin Email
		
		$mailto="support@onedigitalassetshub.com";
		$subject="Withdrawal Notification";
		
		$message ="A User made a withdrawal Request, find the transaction details below for approval:";
		$message .="\n\n";
		$message .="Full Name: ". $fname ."\n";
		$message .="Username: ". $user ."\n";
		$message .="Email: ". $email ."\n";
		$message .="Amount Requested for Withdrawal: ". "$".$withdrawal_amount .".00"."\n";
		$headers = "From: One Digital Assets Hub <support@onedigitalassetshub.com>";
		mail($mailto, $subject, $message, $headers);
		  header('location: withdrawal_list.php');
	  }
		  
	  }
	  
	  
	  
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
<?php include('controllers/config.php'); 
//include('controllers/dashboard.php');
?>
<!DOCTYPE html>
<html>
                                                                                                <head>
    <title>Home | Digital Asset Hub - Systematic Cryptocurrency trading platform</title>
<meta charset="utf-8">
<meta content="ie=edge" http-equiv="x-ua-compatible">

<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="../wp-content/uploads/fevicon.png" rel="shortcut icon">
<link href="../wp-content/uploads/fevicon.png" rel="apple-touch-icon">
<link href="../fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css">
<link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
<link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
<link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
<link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
</head>
<body class="menu-position-side menu-side-left full-screen with-content-panel color-scheme-dark">
<div class="all-wrapper with-side-panel solid-bg-all">


<div class="layout-w">
<!--------------------
START - Mobile Menu
-------------------->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
//s1.src='https://embed.tawk.to/5ec3ffde6f7d401ccbb7fdd1/default';
s1.src='https://embed.tawk.to/5ef9c6cb9e5f69442291804b/1efb78v7q';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script--><div class="menu-mobile menu-activated-on-click color-scheme-dark">
<div class="mm-logo-buttons-w">
    <a class="mm-logo" href="../index.php">
        <img width="100px" height="auto" src="../image/logo.png">
    <span></span>
</a>
<div class="mm-buttons">

<div class="mobile-menu-trigger">
<div class="os-icon os-icon-hamburger-menu-1">
</div>
</div>
</div>
</div>
<div class="menu-and-user">
<div class="logged-user-w">
<div class="avatar-w">
<img alt="" src="img/avatar1.jpg">
</div>
 <!-- logged in user information -->
    <?php  if (isset($_SESSION['user'])) : ?>
	<div class="logged-user-info-w">
		<div class="logged-user-name"><strong><?php echo $_SESSION['user']; ?></strong></div>
		<div class="logged-user-role"><strong><?php echo $_SESSION['user']; ?></strong></div>
	</div>
    
    	<?php endif ?>

</div>
<!--------------------
START - Mobile Menu List
-------------------->
<?php include('mobile_nav.php');?>
<!--------------------
END - Mobile Menu List
-------------------->
<div class="mobile-menu-magic">
    <h4>Digital Asset Hub</h4>
<p>Your very best investment platform</p>
<div class="btn-w">
    <a class="btn btn-white btn-rounded" href="../contact.html">Contact us</a>
</div>
</div>
</div>
</div>

<!--------------------
START - Main Menu
<?php include('sidebar.php');?>
<!--------------------
END - Main Menu
-------------------->
<!--------------------
END - Mobile Menu
-------------------->

<div class="content-w">
<!--------------------
START - Top Bar
-------------------->
<div class="top-bar color-scheme-transparent">
<!--------------------
START - Top Menu Controls
-------------------->
<div class="top-menu-controls">
<!--------------------
START - Messages Link in secondary top menu
-------------------->


<!--------------------
START - User avatar and menu in secondary top menu
-------------------->
<div class="logged-user-w">
<div class="logged-user-i">
<div class="avatar-w">
<img alt="" src="img/avatar1.jpg">
</div>
<div class="logged-user-menu color-style-bright">
<div class="logged-user-avatar-info">
<div class="avatar-w">
<img alt="" src="img/avatar1.jpg">
</div>
 <!-- logged in user information -->
    <?php  if (isset($_SESSION['user'])) : ?>
	<div class="logged-user-info-w">
		<div class="logged-user-name"><strong><?php echo $_SESSION['user']; ?></strong></div>
		<div class="logged-user-role"><strong><?php echo $_SESSION['user']; ?></strong></div>
	</div>
    
    	<?php endif ?>
</div>
<div class="bg-icon">
<i class="os-icon os-icon-wallet-loaded">
</i>
</div>
<ul>

<li>
    <a href="profile.php">
<i class="os-icon os-icon-user-male-circle2">
</i>
<span>Profile Details</span>
</a>
</li>
<li>
    <a href="referrer.php">
<i class="os-icon os-icon-coins-4">
</i>
<span>My Referrals</span>
</a>
</li>
<li>
    <a href="../contact.html">
<i class="os-icon os-icon-others-43">
</i>
<span>Contact Support</span>
</a>
</li>
<li>
    <a href="index.php?logout='1'" >
<i class="os-icon os-icon-signs-11">
</i>
<span>Logout</span>
</a>
</li>
</ul>
</div>
</div>
</div>
<!--------------------
END - User avatar and menu in secondary top menu
-------------------->
</div>
<!--------------------
END - Top Menu Controls
-------------------->
</div>
<!--------------------
END - Top Bar
-------------------->
<!--------------------
START - Breadcrumbs
-------------------->
<ul class="breadcrumb">
<li class="breadcrumb-item">
<a href="../">Home</a>
</li>
<li class="breadcrumb-item">
<a href="#">User</a>
</li>
<li class="breadcrumb-item">
<span>Dashboard</span>
</li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-panel-toggler">
<i class="os-icon os-icon-grid-squares-22">
</i>
<span>Sidebar</span>
</div>
<div class="content-i">
<div class="content-box">
<div class="row">
<div class="col-sm-12">
<div class="element-wrapper">
<?php 
$query2 = mysqli_query($db, "SELECT * FROM acct_details WHERE user_id='$id2'");
$result2 = mysqli_num_rows($query2);
while( $details = mysqli_fetch_assoc($query2)){
	
?>

<h6 class="element-header">Account Overview</h6>
<div class="element-content">
<div class="row">
<div class="col-sm-6 col-xxxl-6">
<a class="element-box el-tablo" href="#">
<div class="label">Available Balance</div>
<div class="value"><?php if (($details['available_bal']) < 0 ){echo '<strong>$0.00</strong>'; }else{echo '<strong>'.'$'.$details['available_bal'].'</strong>'; }?></div><br>
<div class="trending trending-up-basic">
<span>&nbsp;</span>
<i class="fa fa-clock-o">
</i>
</div>
</a>
</div>
<div class="col-sm-6 col-xxxl-6">
<a class="element-box el-tablo" href="#">
<div class="label">Total Withdrawal</div>
<div class="value"><?php if (($details['total_withdrawal']) < 0 ){echo '<strong>$0.00</strong>'; }else{echo '<strong>'.'$'.$details['total_withdrawal'].'</strong>'; }?></div><br>
<div class="trending trending-up-basic">
<span>&nbsp;</span>
<i class="fa fa-clock-o">
</i>
</div>
</a>
</div>
<?php  }  ?>
</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-8">
       <div class="element-wrapper" >
<h6 class="element-header">Create Withdrawal</h6>
<div class="element-box" style=" min-height: 445px; ">
<form role="form" method="POST" action="withdrawal.php">
        <input name="withdraw" type="hidden" value="main">
<h5 class="form-header">Funds Withdrawal</h5>
<div class="form-desc">You can request a withdrawal by filling the withdrawal form below. Funds will be credited to your wallet as soon as your withdrawal is confirmed</div>



<div class="form-group row">
<label class="col-form-label col-sm-4" for=""> Amount to Withdraw</label>
<div class="col-sm-8">
	<?php echo $err_insuficient_fund . $err_invalid_amount; ?>
      <input class="form-control" name="amount" id="amount" placeholder="Amount to withdraw"  type="number">
</div>
</div>
<div class="form-group row">

<div class="col-sm-8">
                                  
                                           
                                            
</div>
</div>


<div class="form-buttons-w" >
<button class="btn btn-success" name="withdraw_btn" onclick="return withdraw_auth()" type="submit"> Withdraw Now</button>
</div>
</form>
</div>
</div>
</div>

<div class="col-sm-4 d-xxxl-none">
<!--START - Top Selling Chart-->
<div class="element-wrapper">
<h6 class="element-header">Account Stats</h6>
<div class="element-box">
<div class="el-chart-w">
<canvas height="120" id="donutChart" width="120">
</canvas>

<?php 
$query3 = mysqli_query($db, "SELECT * FROM deposit WHERE user_id='$id2'");
$result3 = mysqli_num_rows($query3);


?> 
<div class="inside-donut-chart-label">
<strong><?php if (($result3 > 0)){ echo $result3;}else{echo '0';} ?></strong>

<span>Total Transactions</span>
</div>
</div>
<div class="el-legend condensed">
<div class="row">
<div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto col-6">
<div class="legend-value-w">
<div class="legend-pin legend-pin-squared" style="background-color: #D3514D;">
</div>
<div class="legend-value">
<span>Pending Transactions</span>
<div class="legend-sub-value">all pendings</div>
</div>
</div>
<div class="legend-value-w">
<div class="legend-pin legend-pin-squared" style="background-color: #85c751;">
</div>
<div class="legend-value">
<span>Confirmed Transactions</span>
<div class="legend-sub-value">All confirmed</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
<!--END - Top Selling Chart-->
</div>

</div>



</div>
<!--------------------
START - Sidebar
-------------------->

<!--------------------
END - Sidebar
-------------------->
</div>
</div>
</div>
<div class="display-type">
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
<script src="js/demo_customizerce5a.js?version=4.4.1">
</script>


<script>
// -----------------
    // init donut chart if element exists
    // -----------------
    if ($("#donutChart").length) {
      var donutChart = $("#donutChart");

      // donut chart data
      var data = {
        labels: ["Red", "Yellow", "Green"],
        datasets: [{
          data: [1, 0],
          backgroundColor: ["#D3514D", "#59B359"],
          hoverBackgroundColor: ["#5797fc", "#4ecc48"],
          borderWidth: 0
        }]
      };

      // -----------------
      // init donut chart
      // -----------------
      new Chart(donutChart, {
        type: 'doughnut',
        data: data,
        options: {
          legend: {
            display: false
          },
          animation: {
            animateScale: true
          },
          cutoutPercentage: 80
        }
      });
    }
</script>


<script src="js/maince5a.js?version=1589676240">
</script>


    <script type='text/javascript' src='../tawto.js'></script>
    <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
<!-- Mirrored from light.pinsupreme.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Oct 2019 01:10:57 GMT -->
</html>
