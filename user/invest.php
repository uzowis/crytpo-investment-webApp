<?php 
 //error_reporting(0);
  session_start(); 
  include('controllers/config.php');
  $id2 = $_SESSION['id'];
 //$user = $_SESSION['users'];
  
  $sql = "SELECT * FROM users WHERE id='$id2'";
  $result1 = mysqli_query($db, $sql);
  if(mysqli_num_rows($result1) == 1){
	  while($rows = mysqli_fetch_assoc($result1)){
		  $fname = $rows['fname'];
		  $user = $rows['user'];
		  
		  
	  }
  }
  $err_invest = '';
  $err_invest2 = '';
  $plan = '';
  $err_bal ='Insufficient Fund. <br>';
  $err_basic ='';
  $err_sec ='';
  $err_prof ='';
  $err_spec ='';
  $amount_to_invest = '';
  $new_bal = '';
  $available_bal = '';
  $date ='';
  


  if(isset($_POST['invest'])){
	  $plan = $_POST['plan'];
	  $amount_to_invest = $_POST['amount'];
	  
	  $sql3 = mysqli_query($db, "SELECT * FROM acct_details WHERE user_id='$id2'");
	  $result3 = mysqli_fetch_assoc($sql3);
	  $available_bal = $result3['available_bal'];
	  $currently_invested = $result3['currently_invested'];
	  $new_bal = $available_bal-$amount_to_invest;
	  $date = date('Y-m-d H:i:s');
	  if (($plan ==='Basic Plan') && (($amount_to_invest >=200) AND ($amount_to_invest <=999  ) )){
		  if($amount_to_invest <= $available_bal){
			// process investment
			$sql_status = mysqli_query($db, "SELECT * FROM investment WHERE user_id='$id2' AND status='Active'");
			$result_status = mysqli_fetch_assoc($sql_status);
			$status = $result_status['status'];
			
			if($status !=='Active'){
				
				mysqli_query($db, "INSERT INTO investment (user_id, plan, amount, status, date) VALUES ('$id2', '$plan', '$amount_to_invest', 'Active', '$date')") ;
				mysqli_query($db, "UPDATE  acct_details SET currently_invested='$amount_to_invest' WHERE user_id='$id2' ");
				mysqli_query($db, "UPDATE  acct_details SET available_bal='$new_bal' WHERE user_id='$id2'");
				
			
		
			
			header('location: investments.php');
				
			} else {
				$err_invest2 = 'You Have an Active Investment, Kindly wait till its Completed';
			}
			
	
			
				
			
			
		  }else {
			  $err_bal = 'Insufficient Fund. <br>';
		  }
	  }else {
		  $err_basic = 'Min Amount of investment for this plan is $200 and Max is $999';
	  }
	  
	  if (($plan ==='Secondary Plan') && (($amount_to_invest >= 1000) AND ($amount_to_invest <=4999  ) )){
		  
		  if($amount_to_invest <= $available_bal){$sql_status = mysqli_query($db, "SELECT * FROM investment WHERE user_id='$id2' AND status='Active'");
			$result_status = mysqli_fetch_assoc($sql_status);
			$status = $result_status['status'];
			
			if($status !=='Active'){
				
				mysqli_query($db, "INSERT INTO investment (user_id, plan, amount, status, date) VALUES ('$id2', '$plan', '$amount_to_invest', 'Active', '$date')") ;
				mysqli_query($db, "UPDATE  acct_details SET currently_invested='$amount_to_invest' WHERE user_id='$id2' ");
				mysqli_query($db, "UPDATE  acct_details SET available_bal='$new_bal' WHERE user_id='$id2'");
				
			
		
			
			header('location: investments.php');
				
			} else {
				$err_invest2 = 'You Have an Active Investment, Kindly wait till its Completed';
			}
		  }else {
			  $err_bal = 'Insufficient Fund';
		  }
	  }else {
		  $err_sec = 'Min Amount of investment for this plan is $1,000 and Max is $4,999';
	  }
	  
	  if (($plan ==='Professional Plan') && (($amount_to_invest >=4999) AND ($amount_to_invest <=19500  ))){
		  if($amount_to_invest <= $available_bal){
			  
		  $sql_status = mysqli_query($db, "SELECT * FROM investment WHERE user_id='$id2' AND status='Active'");
			$result_status = mysqli_fetch_assoc($sql_status);
			$status = $result_status['status'];
			
			if($status !=='Active'){
				
				mysqli_query($db, "INSERT INTO investment (user_id, plan, amount, status, date) VALUES ('$id2', '$plan', '$amount_to_invest', 'Active', '$date')") ;
				mysqli_query($db, "UPDATE  acct_details SET currently_invested='$amount_to_invest' WHERE user_id='$id2' ");
				mysqli_query($db, "UPDATE  acct_details SET available_bal='$new_bal' WHERE user_id='$id2'");
				
			
		
			
			header('location: investments.php');
				
			} else {
				$err_invest2 = 'You Have an Active Investment, Kindly wait till its Completed';
			}
		  }else {
			  $err_bal = 'Insufficient Fund';
		  }
	  }else {
		  $err_prof = 'Min Amount of investment for this plan is $4,999 and Max is $19,500';
	  }
	  
	  if (($plan ==='A.I Special Plan') && ($amount_to_invest >= 20000   )){
		  if($amount_to_invest <= $available_bal){
			$sql_status = mysqli_query($db, "SELECT * FROM investment WHERE user_id='$id2' AND status='Active'");
			$result_status = mysqli_fetch_assoc($sql_status);
			$status = $result_status['status'];
			
			if($status !=='Active'){
				
				mysqli_query($db, "INSERT INTO investment (user_id, plan, amount, status, date) VALUES ('$id2', '$plan', '$amount_to_invest', 'Active', '$date')") ;
				mysqli_query($db, "UPDATE  acct_details SET currently_invested='$amount_to_invest' WHERE user_id='$id2' ");
				mysqli_query($db, "UPDATE  acct_details SET available_bal='$new_bal' WHERE user_id='$id2'");
				
			
		
			
			header('location: investments.php');
				
			} else {
				$err_invest2 = 'You Have an Active Investment, Kindly wait till its Completed';
			}
		  
		  }else {
			  $err_bal = 'Insufficient Fund';
		  }
	  }else {
		  $err_spec = 'Min Amount of investment for this plan is $20,000';
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

<!----------\\\\\\\\\\ STATRT ....SPACE FOR INNER CONTENT /////////////----------->
<?php include('invest_content.php'); ?>

<!----------\\\\\\\\\\ END ....SPACE FOR INNER CONTENT /////////////----------->

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

<div class="modal fade" id="loginModal">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
						<h5 class="modal-title" id="exampleModalLabel">Create New Investment</h5>
					  </div>
					  <div class="modal-body">
                                              <form role="form" method="POST" action="invest.php">
                                <!--div class="form-group">
                                    <select class="form-control form-control-rounded" name="package" id="package" required="" onchange="setAmounts()">
                                        <option value="">Select Type</option>
                                        <option value="0">Bronze Plan</option><option value="1">Silver Plan</option><option value="2">Gold Plan</option><option value="3">Diamond Plan</option>                                       
                                    </select>
                                </div-->
                                <div class="form-group">
                                    <label>Select Plan</label>
                                    <select style="color: black;" class="form-control form-control-rounded" required="" name="plan">
                                       
                                        <option selected="">Basic Plan</option>
                                        <option>Secondary Plan</option>
                                        <option>Professional Plan</option>
                                        <option>A.I Special Plan</option>                                    
                                    </select>
                                </div>
                                
                                                               
                                <div class="form-group">
                                    <label>Amount ($)</label>
                                    <input type="number" class="form-control form-control-rounded" required="" name="amount" placeholder="Amount to invest">
                                </div>
                                <div class="clearfix">
                                    <button type="submit" name="invest" class="btn  btn-primary float-right">Invest</button>
                                </div>
                            </form>
                            <hr>
                            
					  </div>
					</div>
				  </div>
				</div>

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
















