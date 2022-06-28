<?php 


if((isset($_GET['id'])) && isset($_GET['user_id'])){
	
	$id = $_GET['id'];
	$user_id = $_GET['user_id'];
	$q = mysqli_query($db, "SELECT amount FROM withdrawal WHERE id='$id'");
	$res = mysqli_fetch_assoc($q);
	$amount = $res['amount'];
	mysqli_query($db, "UPDATE acct_details SET available_bal=available_bal-'$amount' WHERE user_id = '$user_id'");
	mysqli_query($db, "UPDATE withdrawal SET status='confirmed' WHERE id = '$id'");
	
	// Send an email notification to User Email
		$sql = "SELECT * FROM users WHERE id='$user_id'";
      $result1 = mysqli_query($db, $sql);
      if(mysqli_num_rows($result1) == 1){
    	  while($rows = mysqli_fetch_assoc($result1)){
    		  $fname = $rows['fname'];
    		  $uname = $rows['uname'];
		        $email = $rows['email'];
		  
		  
	  }
  }
		$mailto2=$email;
		$subject2="Withdrawal Request Approved";
		
		$message2 ="Hello, \n";
		$message2 .="\n\n";
		$message2 .="We wish to inform you that your withdrawal request was approved, kindly exercise patience while we process your funds." ."\n";
		$message2 .="Regards,"."\n";
		$message2 .="Support Team"."\n";
		$headers2 = "From: One Digital Assets Hub <support@onedigitalassetshub.com>";
		mail($mailto2, $subject2, $message2, $headers2);
		
	echo "<script type='text/javascript'>location.href='confirmed_withdrawal.php';</script>";
}
?>


<div class="content-i">
<div class="content-box">
<div class="row">
<div class="col-sm-12">
    
<div class="element-wrapper">

<h6 class="element-header">Pending Withdrawals</h6>
<div class="element-content">
<div class="row">

<div class="col-md-12">
<div class="element-box">


<div class="table-responsive">
<div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">


<div class="col-sm-12">
<form action="" method="GET">
<table id="dataTable1" width="100%" class="table table-striped table-lightfont dataTable no-footer" role="grid" aria-describedby="dataTable1_info" style="width: 100%;">
<thead>
<tr role="row">

<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 270px;">User</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 270px;">Email</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="BTC Wallet: activate to sort column ascending" style="width: 270px;">BTC Wallet</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 270px;">Amount ($)</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Available Balance: activate to sort column ascending" style="width: 270px;">Available Balance</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Status: activate to sort column descending" style="width: 270px;">Status</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1"  aria-label="Date: activate to sort column descending"style="width: 270px;">Date</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1"  aria-label="Action: activate to sort column descending"style="width: 270px;">Action</th>
</tr>
</thead>

<tbody>
 <?php 
$query3 = mysqli_query($db, "SELECT users.fname, users.email, users.bit_wallet, withdrawal.amount, withdrawal.id, withdrawal.status, withdrawal.date, acct_details.available_bal, acct_details.user_id FROM users, withdrawal, acct_details WHERE withdrawal.user_id = users.id=acct_details.user_id AND withdrawal.status = 'pending' ORDER BY withdrawal.id DESC");
$result3 = mysqli_num_rows($query3);
while( $details3 = mysqli_fetch_assoc($query3)){

?> 
<?php if ($result3 > 0){ ?>
<tr class="odd">

	
	<td> <?php echo $details3['fname']; ?></td>
	<td> <?php echo $details3['email'];?></td>
	<td> <?php echo $details3['bit_wallet']; ?></td>
	<td> <?php echo '$'.$details3['amount']; ?></td>
	<td> <?php echo '$'.$details3['available_bal']; ?></td>
	<td><span class='badge badge-warning'> <?php echo $details3['status']; ?></span></td>
	<td><?php echo $details3['date']; ?></td>
	<td><a  type="submit" class="btn btn-success btn-rounded"  href="pending_withdrawal.php?id=<?php echo $details3['id'];?> && user_id=<?php echo $details3['user_id'];?>">Confirm</a></td>
	<?php }else { ?>
<td valign="top" colspan="3" class="dataTables_empty">No data available in table</td></tr>
	<?php }};?>        

 
</tbody>
</table>
</form>
</div>




</div>
</div>


</div>
</div>


</div>
</div>
</div>
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



