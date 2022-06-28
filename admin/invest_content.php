<div class="content-i">
<div class="content-box">
<div class="row">
<div class="col-sm-12">
<div class="element-wrapper">

<h6 class="element-header">Create Investment</h6>
<div class="element-content">
<?php 
if (($amount_to_invest) > $available_bal){
echo "<div class='alert alert-danger'>".$err_bal."</div><br>";	
}elseif ($err_basic){
 $err_basic = 'Please check Min and Max Amount for the plan you choose and try again';
echo "<div class='alert alert-info'>".$err_basic."</div><br>";	
}elseif ($err_sec){
 $err_sec = 'Min Amount of investment for this plan is $1,000 and Max is $4,999';
echo "<div class='alert alert-info'>".$err_sec."</div><br>";	
}elseif (($plan ==='Professional Plan') && $err_prof){
  $err_prof = 'Min Amount of investment for this plan is $4,999 and Max is $19,500';
echo "<div class='alert alert-info'>".$err_prof."</div><br>";	
}elseif ($err_spec){
	 $err_spec = 'Min Amount of investment for this plan is $20,000';
echo "<div class='alert alert-info'>".$err_spec."</div><br>";	
}
?>
<div class="pricing-plans row no-guttersk">

    <div class="pricing-plan col-md-3">
<div class="plan-head">

    <div class="plan-name">Basic Plan</div>
</div>
<div class="plan-body">
<div class="plan-price-w">
<div class="price-value">7%</div>
<div class="price-label">in 2 Days</div>
</div>
<div class="plan-btn-w">
<button class="btn btn-success btn-rounded" data-toggle="modal" data-target="#loginModal">Invest Now</button>
</div>
</div>
<div class="plan-description">
<h6>Plan Description</h6>
<p><small>This plan is suitable for first time investors with relatively little knowledge of the financial market; and also low income investors with low to no-risk tolerance. Interest in this plan is fairly low.</small></p>
<p><b>NOTE:</b> INVESTMENT IN THIS PACKAGE CANNOT BE ROLLED OVER.</p>
<h6>Features</h6>
<ul>
    <li>Min. $200</li>
    <li>Max. $999</li>
<li>3% Referral Bonus</li>
</ul>
</div>
</div>
    
    
<div class="pricing-plan col-md-3 ">
<div class="plan-head">

<div class="plan-name">Secondary Plan</div>
</div>
<div class="plan-body">
<div class="plan-price-w">
    <div class="price-value">10%</div>
<div class="price-label">in 3 Days</div>
</div>
<div class="plan-btn-w">
    <button class="btn btn-success btn-rounded" data-toggle="modal" data-target="#loginModal">Invest Now</button>
</div>
</div>
<div class="plan-description">
<h6>Plan Description</h6>
<p><small>Investors in this plan are expected to at least have a fair knowledge of the financial markey, fair income level, and have probably passed through the Basic Investment Package. Investment in this package can be rolled over a few times. The risk tolerance here is relatively high compared to the Basic Investment package.</small></p>
<p><b>NOTE:</b> INVESTMENT IN THIS PACKAGE CAN BE ROLLED OVER UP TO THREE TIMES WITH 50% INCREASE FROM THE LAST DEPOSIT.</p>
<h6>Features</h6>
<ul>
    <li>Min. $1,000</li>
    <li>Max. $4,999</li>
<li>3% Referral Bonus</li>

</ul>
</div>
</div>
    
    
<div class="pricing-plan col-md-3 highlight">
<div class="plan-head">

<div class="plan-name">Professional Plan</div>
</div>
<div class="plan-body">
<div class="plan-price-w">
    <div class="price-value">20%</div>
<div class="price-label">in 7 Days</div>
</div>
<div class="plan-btn-w">
    <button class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#loginModal">Invest Now</button>
</div>
</div>
<div class="plan-description">
<h6>Plan Description</h6>
<p><small>Investors in this package makes you a professional financial market investors with a good knowledge of the financial market, of high-risk tolerance, and of good income level. Investment interest here is relatively higher to the first two packages, and the completion of this plan qaulifies you as an accredited investor with the company.</small></p>
<p><b>NOTE:</b> INVESTMENT IN THIS PLAN CAN BE ROLLED OVER UP TO FOUR TIMES WITH 40% INCREASE FROM THE LAST DEPOSIT.</p>
<h6>Features</h6>
<ul>
    <li>Min. $4,999</li>
    <li>Max. $19,500</li>
<li>5% Referral Bonus</li>
</ul>
</div>
</div>
    
<div class="pricing-plan col-md-3">
<div class="plan-head">

<div class="plan-name">A.I Special Plan</div>
</div>
<div class="plan-body">
<div class="plan-price-w">
    <div class="price-value">50%</div>
<div class="price-label">in 15 Days</div>
</div>
<div class="plan-btn-w">
    <button class="btn btn-success btn-rounded" data-toggle="modal" data-target="#loginModal">Invest Now</button>
</div>
</div>
<div class="plan-description">
<h6>Plan Description</h6>
<p><small>SCOPE: $2000 WEEKLY DEPOSIT.</small></p>
<p><small>INTEREST: 25% WEEKLY SUSTENANCE PROFIT, AND A 60% TOTAL INVESTMENT PROFIT AT THE COMPLETION OF THE INVESTMENT PERIOD.</small></p>
<p><small>This investment package is especially for the accredited investors of the company. High income, long term focused customers can also participate in this package. Investors are to go through an identity verification process to participate in this investment package to ensure security and authenticity. A successful participation in this package qualifies an investor as a representative and stakeholders of the company.</small></p>
<p><b>NOTE:</b> INVESTMENT IN THIS PLAN CAN BE CONTINUED FOR AS LONG AS THE INVESTOR CAN AFFORD TO.</p>


<h6>Features</h6>
<ul>
    <li>Min. $20,000</li>
    <li>Max. UNLIMITED</li>
<li>5% Referral Bonus</li>
</ul>
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