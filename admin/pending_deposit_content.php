<?php 
// Approve Deposits
if(isset($_GET['activate'])){
	
	$id = $_GET['activate'];
	$user_id = $_GET['user_id'];
	$amount = $_GET['amount'];
	mysqli_query($db, "UPDATE deposit SET status='confirmed' WHERE id = '$id'");
	mysqli_query($db, "UPDATE acct_details, deposit SET acct_details.available_bal=acct_details.available_bal+'$amount' WHERE deposit.id='$id' AND acct_details.user_id = '$user_id' ");
	echo "<script type='text/javascript'>location.href='confirmed_deposit.php';</script>";
}
?>

<div class="content-i">
<div class="content-box">
<div class="row">
<div class="col-sm-12">
    
<div class="element-wrapper">

<h6 class="element-header">Pending Deposits</h6>
<div class="element-content">
<div class="row">

<div class="col-md-12">
<div class="element-box">


<div class="table-responsive">
<div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">


<div class="col-sm-12">
<form action="" method="GET" >
<table id="dataTable1" width="100%" class="table table-striped table-lightfont dataTable no-footer" role="grid" aria-describedby="dataTable1_info" style="width: 100%;">
<thead>
<tr role="row">

<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 270px;">User</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 270px;">Email</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="BTC Wallet: activate to sort column ascending" style="width: 270px;">BTC Wallet</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="BTC Wallet: activate to sort column ascending" style="width: 270px;">Mode of Payment</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 270px;">Amount ($)</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 270px;">Status</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Date: activate to sort column descending" style="width: 270px;">Date</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1"  aria-label="Action: activate to sort column descending"style="width: 270px;">Action</th>
</tr>
</thead>

<tbody>

 <?php 
$query3 = mysqli_query($db, "SELECT users.fname, users.email, users.bit_wallet, deposit.amount, deposit.user_id, deposit.id, deposit.method_of_payment, deposit.status, deposit.date FROM users, deposit WHERE deposit.user_id = users.id AND deposit.status = 'pending' ");
$result3 = mysqli_num_rows($query3);
while( $details3 = mysqli_fetch_assoc($query3)){

?> 
<?php if ($result3 > 0){ ?>
<tr class="odd">

	
	<td> <?php echo $details3['fname']; ?></td>
	<td> <?php echo $details3['email'];?></td>
	<td> <?php echo $details3['bit_wallet']; ?></td>
	<td> <?php echo $details3['method_of_payment']; ?></td>
	<td> <?php echo '$'.$details3['amount']; ?></td>
	<td><span class='badge badge-warning'> <?php echo $details3['status']; ?></span></td>
	<td><?php echo $details3['date']; ?></td>
	<td><a  type="submit" class="btn btn-success btn-rounded"  href="pending_deposit.php?activate=<?php echo $details3['id']?> && amount=<?php echo $details3['amount'];?> && user_id=<?php echo $details3['user_id'];?>">Activate</a></td>
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



