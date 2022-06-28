<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
if(isset($_POST['update'])){
	$new_bal = $_POST['new_bal'];
	$id =$_POST['id'];
	
	mysqli_query($db, "UPDATE acct_details SET available_bal='$new_bal' WHERE user_id='$id'");
	echo "<script type='text/javascript'>location.href='load_wallet.php';</script>";
}
?>

<div class="row">
<div style="margin-left:20px;" class="col-md-3">
</div>
<div  class="col-md-6">
<br>
       <div class="element-wrapper" >

<div class="element-box" style=" min-height: 445px; ">
<form role="form" method="POST" action="wallet_update.php">
<h5 class="form-header">Update User Account Balance</h5>
<?php 
$query3 = mysqli_query($db, "SELECT * FROM users, acct_details WHERE users.id = acct_details.user_id AND users.id='$id' ");
$result3 = mysqli_num_rows($query3);
$details3 = mysqli_fetch_assoc($query3);
?> 
	<label class="col-form-label">User</label>
	<input class="form-control" name="user"  value="<?php echo $details3['fname'];?>">
	<input type="hidden" name="id"  value="<?php echo $id;?>">
	
	<label class="col-form-label">Available Balance</label>
	<input name="new_bal" class="form-control"  value="<?php echo $details3['available_bal'];?>">
	

<div class="form-buttons-w" >
<input  type="submit" class="btn btn-success" name="update" value="Update Balance"> 
</div>
</form>
</div>
</div>
</div>
<div class="col-md-3">
</div>
</div>