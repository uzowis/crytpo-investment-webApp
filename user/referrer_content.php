<div class="content-i">
<div class="content-box">
<div class="row">
<div class="col-sm-12">
    <div class="element-wrapper">
<h6 class="element-header">My Network</h6>
<div class="element-box">
<h5 class="form-header">Referral Link</h5>
<div class="form-desc">Share your referral link to increase your earnings</div>
<form class="form-inline" onsubmit="return false;">
    <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="width: 100%;">

<input class="form-control" id="copy-text" placeholder="Ref. Link" type="text" value="https://onedigitalassetshub.com/user/register.php?ref=<?php echo $user;?>" readonly="">
<div class="input-group-prepend">
<div class="input-group-text"><button class="btn btn-primary" id="referralLink" type="submit"> Copy</button></div>
</div>
</div>

</form>
</div>
</div>
<div class="element-wrapper">

<h6 class="element-header">My Referrals</h6>
<div class="element-content">

<div class="row">
<div class="col-md-12">
<div class="element-box">
<h5 class="form-header">Referrals</h5>
<div class="form-desc">Through this screen, you can get an overview of all your referrals so far.
</div>
<?php 
$query3 = mysqli_query($db, "SELECT * FROM referral WHERE user_id='$id2' ORDER BY id DESC");
$result3 = mysqli_num_rows($query3);
if ($result3 <= 0) {?>
<div class='col-xs-12'>
                                        <div class='alert alert-danger' role='alert' style='color:#000;'><i class='fa fa-exclamation-triangle'></i> You haven't referred anyone yet!
                            </div> 
                                    </div> 
<?php }?>


<div class="table-responsive">
<div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">


<div class="col-sm-12">
<table id="dataTable1" width="100%" class="table table-striped table-lightfont dataTable no-footer" role="grid" aria-describedby="dataTable1_info" style="width: 100%;">
<thead>
<tr role="row">
<th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1"  style="width: 263px;">Name</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Amount ($): activate to sort column ascending" style="width: 433px;">Username</th>
<th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 270px;">Date</th>
</tr>
</thead>

<tbody>
 <?php 
$query3 = mysqli_query($db, "SELECT * FROM referral WHERE user_id='$id2' ORDER BY id DESC");
$result3 = mysqli_num_rows($query3);
while( $details3 = mysqli_fetch_assoc($query3)){

?> 
<tr class="odd">
	<?php if ($result3 > 0){ ?>
	<td> <?php echo  $details3['fname']; ?></td>
	<td> <?php echo $details3['user']; ?></td>
	<td><?php echo $details3['reg_date']; ?></td>
	
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
</div>
</div>
<div class="display-type">
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
          data: [3, 0],
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


<script src="js/maince5a.js?version=1589766430">
</script>


<script>
document.getElementById("referralLink").onclick = function() {
  
   // document.execCommand(\'copy\');
   // iosCopyToClipboard("copy-text");
   Clipboard.copy(document.getElementById("copy-text").value);
   document.getElementById("copy-text").select();
   alert("Copied!");
} 

function iosCopyToClipboard(el) {
    var oldContentEditable = el.contentEditable,
        oldReadOnly = el.readOnly,
        range = document.createRange();

    el.contenteditable = true;
    el.readonly = false;
    range.selectNodeContents(el);

    var s = window.getSelection();
    s.removeAllRanges();
    s.addRange(range);

    el.setSelectionRange(0, 999999); // A big number, to cover anything that could be inside the element.

    el.contentEditable = oldContentEditable;
    el.readOnly = oldReadOnly;

    document.execCommand('copy');
}
</script>
<script>
window.Clipboard = (function(window, document, navigator) {
    var textArea,
        copy;

    function isOS() {
        return navigator.userAgent.match(/ipad|iphone/i);
    }

    function createTextArea(text) {
        textArea = document.createElement('textArea');
        textArea.value = text;
        document.body.appendChild(textArea);
    }

    function selectText() {
        var range,
            selection;

        if (isOS()) {
            range = document.createRange();
            range.selectNodeContents(textArea);
            selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
            textArea.setSelectionRange(0, 999999);
        } else {
            textArea.select();
        }
    }

    function copyToClipboard() {        
        document.execCommand('copy');
        document.body.removeChild(textArea);
    }

    copy = function(text) {
        createTextArea(text);
        selectText();
        copyToClipboard();
    };

    return {
        copy: copy
    };
})(window, document, navigator);
</script>
<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>
