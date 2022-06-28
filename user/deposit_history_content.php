<div class="content-i">
<div class="content-box">
<div class="row">
<div class="col-sm-12">
    
<div class="element-wrapper">

<h6 class="element-header">Deposit History</h6>
<div class="element-content">
<div class="row">

<div class="col-md-12">
<div class="element-box">


<div class="table-responsive">
<div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">


<div class="col-sm-12">
<table id="dataTable1" width="100%" class="table table-striped table-lightfont dataTable no-footer" role="grid" aria-describedby="dataTable1_info" style="width: 100%;">
<thead>
<tr role="row">

<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Amount ($): activate to sort column ascending" style="width: 433px;">Amount ($)</th>

<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 270px;">Status</th>
<th class="sorting_desc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Date: activate to sort column descending" style="width: 270px;">Date</th>
</tr>
</thead>

<tbody>
 <?php 
$query3 = mysqli_query($db, "SELECT * FROM deposit WHERE user_id='$id2' ORDER BY id DESC");
$result3 = mysqli_num_rows($query3);
while( $details3 = mysqli_fetch_assoc($query3)){

?> 
<tr class="odd">
	<?php if ($result3 > 0){ ?>
	<td> <?php echo '$'.$details3['amount']; ?></td>
	<td><span class='badge badge-warning'> <?php echo $details3['status']; ?></span></td>
	<td><?php echo $details3['date']; ?></td>
	<?php }else { ?>
<td valign="top" colspan="3" class="dataTables_empty">No data available in table</td></tr>
	<?php }};?>        

 
</tbody>
</table></div>




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



