<!--------------------
START - Main Menu
-------------------->
<div class="menu-w color-scheme-dark color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-bright menu-activated-on-hover menu-has-selected-link">
<div class="logo-w">
<a class="logo" href="../">

    <div class="logo-label">- DIGITAL ASSET HUB -
	<p>Admin Dashboard</p>
	
	</div>
</a>
</div>
<div class="logged-user-w avatar-inline">
<div class="logged-user-i">
<div class="avatar-w">
<img alt="" src="img/avatar1.jpg">
</div>
<div class="logged-user-info-w">
<div class="logged-user-name"><strong><?php echo $fname; ?></strong></div>
<div class="logged-user-role"><strong><?php echo $uname; ?></strong></div>
</div>	
<div class="logged-user-toggler-arrow">
<div class="status-pill green">
        </div>
</div>

</div>
</div>


<h1 class="menu-page-header">Page Header</h1>
<ul class="main-menu">
<li class="sub-header">
<span>Transaction Functions</span>
</li>
<li class="selected active">
    <a href="index.php">
<div class="icon-w">
<div class="os-icon os-icon-layout">
</div>
</div>
<span>Dashboard</span>
</a>
</li>




<li class="has-sub-menu">
<a href="pending_deposit.php"><div class="icon-w"><div class="os-icon os-icon-briefcase"></div></div>
<span>Deposits</span></a>
<div class="sub-menu-w">
<div class="sub-menu-header">Deposits</div>
<div class="sub-menu-icon"><i class="os-icon os-icon-briefcase"></i></div>
<div class="sub-menu-i">
<ul class="sub-menu">
<li><a href="pending_deposit.php">Pending Deposits</a></li>
<li><a href="confirmed_deposit.php">Confirmed Deposits</a></li>
<li><a href="load_wallet.php">Load Wallets</a></li>
</ul>
</div>
</div>
</li>

<li class="has-sub-menu">
<a href="active_investment.php"><div class="icon-w"><div class="os-icon os-icon-layers"></div></div>
<span>Investments</span></a>
<div class="sub-menu-w">
<div class="sub-menu-header">Investments</div>
<div class="sub-menu-icon"><i class="os-icon os-icon-layers"></i></div>
<div class="sub-menu-i">
<ul class="sub-menu">
<li><a href="active_investment.php">Active Investments</a></li>
<li><a href="completed_investment.php">Completed Investments</a></li>
</ul>
</div>
</div>
</li>

<li class="has-sub-menu">
<a href="pending_withdrawal.php"><div class="icon-w"><div class="os-icon os-icon-coins-4"></div></div>
<span>Withdrawals</span></a>
<div class="sub-menu-w">
<div class="sub-menu-header">Withdrawal</div>
<div class="sub-menu-icon"><i class="os-icon os-icon-coins-4"></i></div>
<div class="sub-menu-i">
<ul class="sub-menu">
<li><a href="pending_withdrawal.php">Pending Withdrawals</a></li>
<li><a href="confirmed_withdrawal.php">Confirmed withdrawals</a></li>
</ul>
</div>
</div>
</li>

<li class="sub-header">
<span>User Account Options</span>
</li>
<li class="has-sub-menu selected">
<a href="users.php"><div class="icon-w"><div class="os-icon os-icon-users"></div></div>
<span>Users</span></a>
<div class="sub-menu-w">
<div class="sub-menu-header">Users</div>
<div class="sub-menu-icon"><i class="os-icon os-icon-users"></i></div>
<div class="sub-menu-i">
<ul class="sub-menu">
<li><a href="users.php">Registered Users</a></li>
<!--<li><a href="users_acct.php">Users Account Details</a></li>-->
</ul>
</div>
</div>
</li>

<li class="selected ">
    <a href="profile.php">
<div class="icon-w">
<div class="os-icon os-icon-grid">
</div>
</div>
<span>Admin Profile</span>
</a>
</li>


<li class="sub-header">
<span>Other Links</span>
</li>
<li class="">
    <a href="../contact.html">
<div class="icon-w">
<div class="os-icon os-icon-phone-15">
</div>
</div>
<span>Contact Support</span>
</a>
</li>
<li class="">
    <a href="../index.html">
<div class="icon-w">
<div class="os-icon os-icon-link-3">
</div>
</div>
<span>Back to Homepage</span>
</a>
</li>

<li class="">
    <a href="index.php?logout='1'">
<div class="icon-w">
<div class="os-icon os-icon-log-out">
</div>
</div>
<span>Logout</span>
</a>
</li>




</ul>
<div class="side-menu-magic">
    <h4>Digital Asset Hub</h4>
<p>Your best investment platform</p>
<div class="btn-w">
    <a class="btn btn-white btn-rounded" href="../contact.html" target="_blank">Contact us</a>
</div>
</div>
</div><!--------------------
END - Main Menu
-------------------->