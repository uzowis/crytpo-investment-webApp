<?php 
$id2 = $_SESSION['id'];
$user = $_SESSION['user'];
//$plan = '';
//$amount ='';
//$btc_equiv ='';

if(isset($_POST['deposit_btn']) && (!empty($_POST['amount']))){
	$method = $_POST['method'];
	$amount = $_POST['amount'];
	
    $query5 = mysqli_query($db, "SELECT * FROM admin");
    $result5 = mysqli_num_rows($query5);
    $details5 = mysqli_fetch_assoc($query5);
    $btc_wallet = $details5['btc_wallet'];
    $ether_wallet = $details5['ether_wallet'];
    $btc_cash_wallet = $details5['btc_cash_wallet'];
	
	if($method ==="Bitcoin"){
	  //  $rate = 0;
		$wallet = $btc_wallet;
	//	$btc_equiv = ($amount * $rate);
	//	$btc_equiv = ($amount);
		
	}elseif($method ==="Ethereum"){
	 //   $rate = 1;
		$wallet = $ether_wallet;
	//	$btc_equiv = ($amount * $rate);
		
	}elseif($method ==="Bitcoin Cash"){
		$rate = 1;
		$wallet = $btc_cash_wallet;
	//	$btc_equiv = ($amount * $rate);
	
	}
	
	
	
	
}


?>
<div class="content-i">
<div class="content-box">

<div class="row">
<div class="col-md-8">

    <div class="element-wrapper" >
<h6 class="element-header">Complete Deposit</h6>
<div class="element-box" style=" min-height: 445px !important; width: auto !important; ">

        
<h5 class="form-header">Confirm Deposit</h5>




<div class="row">

<div class="col-sm-8">
  <div class="table-responsive">
  <table id="dataTable1" class="table table-striped table-lightfont">

    <tr>
      <th>AMOUNT</th>
      <th><?php echo '$'.$amount; ?></th>
    </tr>
    <tr>
      <th>MODE OF PAYMENT</th>
      <th><?php echo $method; ?></th>
    </tr>

  </table>
</div>
<br> 
 <h6> Please send exactly <strong><?php echo "($".$amount.")" ; ?></strong> worth Bitcoin to </h6> 
 <h5><?php echo $wallet; ?></h5>
 <br><br>
<small><h6><strong>Order status:</strong> Waiting for payment</h6></small>

</div>
</div>
<form action="payment_process.php" method="post">


          <input type="hidden" value="<?php echo $amount;?>" name="amount">
          <input type="hidden" value="<?php echo $btc_equiv;?>" name="btc_equiv">
          <input type="hidden" value="<?php echo $method;?>" name="method">
          <input type="hidden" value="Pending" name="status">

<button class="btn btn-success" name="payment_btn" type="submit"> SAVE TRANSACTION</button>

</form>
</div>
</div>
</div>
<div class="col-md-4">
<!--START - Top Selling Chart-->
<div class="element-wrapper">
<h6 class="element-header">Qr Code</h6>
<div class="element-box">
<div class="el-chart-w">
<canvas height="120" id="donutChart" width="120">
</canvas>
<div class="inside-donut-chart-label">
  <h5>SCAN QR TO PAY</h5>
<img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=bitcoin:<?php echo $wallet;?>?amount=<?php echo $btc_equiv; ?>">
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