<div class="content-i">
<div class="content-box">
<div class="row">
<div class="col-sm-12">
    
<div class="element-wrapper">

<h6 class="element-header">Load Wallets</h6>
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
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="BTC Wallet: activate to sort column ascending" style="width: 270px;">BTC Wallet</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 270px;">Current Balance ($)</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 270px;">Action</th>
</tr>
</thead>

<tbody>

 <?php 
$query3 = mysqli_query($db, "SELECT users.fname, users.id, users.bit_wallet, acct_details.available_bal, acct_details.user_id FROM users, acct_details WHERE acct_details.user_id = users.id ");
$result3 = mysqli_num_rows($query3);
while( $details3 = mysqli_fetch_assoc($query3)){

?> 
<?php if ($result3 > 0){ ?>
<tr class="odd">

	<!--<td style="display:none;"><input name="id" value="<?php //echo $details3['id']?>" type="hidden"></td>-->
	<td> <?php echo $details3['fname']; ?></td>
	<td> <?php echo $details3['bit_wallet']; ?></td>
	<td> <?php echo "$". $details3['available_bal'].".00"; ?></td>
	<td><a  type="submit" class="btn btn-success btn-rounded" name="update"  href="wallet_update.php?id=<?php echo $details3['user_id'];?>" >Edit</a></td>
	<?php }else { ?>
<td valign="top" colspan="3" class="dataTables_empty">No data available in table</td></tr>
	<?php }};?>        


</tbody>


</table>
 </form>
</div>




</div>
</div>


<div class="modal fade" id="updateModal">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
						<h5 class="modal-title" id="exampleModalLabel">Fund Wallet</h5>
					  </div>
					  <div class="modal-body">
                                              <form role="form" method="GET" action="">
                                     
                                <div class="form-group">
                                    <label>Amount ($)</label>
                                    <input type="number" class="form-control form-control-rounded" required="" name="new_amount" placeholder="Amoun to Deposit">
                                </div>
                                <div class="clearfix">
                                    <button type="submit" name="invest" class="btn  btn-primary float-right">Update</button>
                                </div>
                            </form>
                            <hr>
                            
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



</div>
<!--------------------
START - Sidebar
-------------------->

<!--------------------
END - Sidebar
-------------------->
</div>



