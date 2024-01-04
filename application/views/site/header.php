<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Admin Panel</title>
		<meta name="description" content="Pathology Admin Panel" />
		<meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Bootstrap, Light weight Admin Dashboard,Light weight, Light weight Admin, Light weight Dashboard" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">

		<!-- Animate CSS -->
		<link href="<?php echo base_url();?>css/animate.css" rel="stylesheet" media="screen">

		<!-- date range -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/daterange.css">

		<!-- Main CSS -->
		<link href="<?php echo base_url();?>css/main.css" rel="stylesheet" media="screen">

		<!-- Slidebar CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/slidebars.css">

		<!-- Font Awesome -->
		<link href="<?php echo base_url();?>fonts/font-awesome.min.css" rel="stylesheet">

		<!-- Metrize Fonts -->
		<link href="<?php echo base_url();?>fonts/metrize.css" rel="stylesheet">

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
			<script src="<?php echo base_url();?>ckeditor/ckeditor.js" type="text/javascript"></script>
			<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	 
<style>

	.edit
	{
		color:green;
	}
	.delete
	{
		color:red;
	}
	.cart
	{
		color:green;
	}
	.eye
	{
		color:#f49805;
	}
	.subscribe
	{
		color:#12a4f4;
	}
	.delete
	{
		color:red;
	}
	.ifont
	{
		
	}
	.backicon
	{
		position:absolute;
		left: 95%;
		top: 35%;
		color:#53ace5;
	}
	.required::after 
	{
        content: ' *';
        color: red;
	}
	.error
	{
		color:red;
	}
	
	
	.custom-search i {
    padding: 6px 15px;
    cursor: pointer;
    top: 7px;
    position: absolute;
    right: 0;
    color: #85c754;
    font-size: 21px;
    border-left: 1px solid #E5E7EA;
}
.custom-search {
    margin: 0px 0 0 0; 
    float: right;
    position: relative;
}
</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>

$(window).on('load', function() 
	{
		setTimeout( function(){ 
		HideMsg();
		}, 2000 );
	}); 
function HideMsg()
{
	$(".auto_hide").hide('slow');
}
</script>
	</head>  
<body> 
		<aside id="sidebar"> 
			<a href="#" class="logo">
				<img src="<?php echo base_url();?>img/logo.png" alt="logo"> 
			</a> 
			<div id='menu'>
				<ul> 
				
					<?php 
							if($this->uri->segment(1)=="Dashboard")
								{
									$class='class="highlight"';
								}
							else
								{
									$class='';
								}
						?>
					<li <?php echo $class;?>>
						
						<?php echo anchor("Dashboard/","<i class='fa fa-th-large ifont' aria-hidden='true'>&nbsp;&nbsp;Dashboard</i>")?>
					</li> 
					<?php 
							if($this->uri->segment(1)=="Package" || $this->uri->segment(1)=="MembershipMenu")
								{
									$class='class="highlight"';
								}
							else
								{
									$class='';
								}
						?>
					<li  <?php echo $class;?> >
						
						<?php echo anchor("Package/","<i class='fa fa-th-list ifont' aria-hidden='true'>&nbsp;&nbsp;Membership</i>")?>
					</li>
					<?php 
							if($this->uri->segment(1)=="Customer" || $this->uri->segment(1)=="Subscription")
								{
									$class='class="highlight"';
								}
							else
								{
									$class='';
								}
						?>
					<li <?php echo $class;?>>
						
						<?php echo anchor("Customer/","<i class='fa fa-user ifont' aria-hidden='true'>&nbsp;&nbsp;Customer & Subscription</i>")?>
					</li> 
					
					<!-- <?php 
							 if($this->uri->segment(1)=="Subscription")
								 {
									$class='class="highlight"';
								 }
							else
								 {
									 $class='';
								 }
						 ?>
					 <li  <?php echo $class;?> >
						
						 <?php echo anchor("Subscription/","<i class='fa fa-bell ifont' aria-hidden='true'>&nbsp;&nbsp;Subscription</i>")?>
					 </li>-->
					<?php 
							if($this->uri->segment(1)=="Document")
								{
									$class='class="highlight"';
								}
							else
								{
									$class='';
								}
						?>
					<li  <?php echo $class;?> >
						
						<?php echo anchor("Document/","<i class='fa fa-check-circle ifont' aria-hidden='true'>&nbsp;&nbsp;Subscription Approval</i>")?>
					</li>
						<?php 
							if($this->uri->segment(1)=="SubscriptionBalance")
								{
									$class='class="highlight"';
								}
							else
								{
									$class='';
								}
						?>
					<li  <?php echo $class;?> >
						
						<?php echo anchor("SubscriptionBalance/","<i class='fa fa-money ifont' aria-hidden='true'>&nbsp;&nbsp;Subscription Balance</i>")?>
					</li>
							<?php 
							if($this->uri->segment(1)=="Payment")
								{
									$class='class="highlight"';
								}
							else
								{
									$class='';
								}
						?>
					<li  <?php echo $class;?> >
						
						<?php echo anchor("Payment/","<i class='fa fa-paypal ifont' aria-hidden='true'>&nbsp;&nbsp;Subscription Payment</i>")?>
					</li>
					<?php 
						if($this->uri->segment(1)=="Staff" || $this->uri->segment(1)=="Permission" )
							{
								$class='class="highlight"';
							}
						else
							{
								$class='';
							}
					?>
					<li  <?php echo $class;?> >
						
						<?php echo anchor("Staff/","<i class='fa fa-users ifont' aria-hidden='true'>&nbsp;&nbsp;Staff</i>")?>
					</li>
					<!--<?php 
						if($this->uri->segment(1)=="Permission")
							{
								$class='class="highlight"';
							}
						else
							{
								$class='';
							}
					?>
					<li  <?php echo $class;?> >
						
						<?php echo anchor("Permission/","<i class='fa fa-lock ifont' aria-hidden='true'>&nbsp;&nbsp;Permission</i>")?>
					</li>-->
						
					<?php 
						if($this->uri->segment(1)=="ChangePassword")
							{
								$class='class="highlight"';
							}
						else
							{
								$class='';
							}
					?>
					<li <?php echo $class;?>>
						
						<?php echo anchor("ChangePassword/","<i class='fa fa-lock ifont' aria-hidden='true'>&nbsp;&nbsp;Change Password</i>")?>
					</li>
					<?php 
						if($this->uri->segment(1)=="Login")
							{
								$class='class="highlight"';
							}
						else
							{
								$class='';
							}
					?>
					<li <?php echo $class;?>>
						
						<?php echo anchor("Logout/","<i class='fa fa-sign-out ifont' aria-hidden='true'>&nbsp;&nbsp;Logout</i>")?>
					</li>
					
					
					
				</ul>
			</div>
		</aside>
		
		<div class="dashboard-wrapper">
       <header>
				<ul class="pull-left" id="left-nav">
					<li class="hidden-lg hidden-md hidden-sm">
						<div class="logo-mob clearfix">
							<h2><div class="fs1"></div><span>Health Farm Lab</span></h2>
						</div>
					</li>
					
				</ul>
				<div class="pull-right">
					<ul id="mini-nav" class="clearfix"> 
						<li class="list-box hidden-xs dropdown">
							<a id="drop1" href="#" role="button" class="dropdown-toggle current-user" data-toggle="dropdown">
								<b>Admin Panel</b><br>
								<span><?php echo @date('d-m-Y'); ?></span>
							</a>
						</li>
						<li class="list-box hidden-lg hidden-md hidden-sm" id="mob-nav">
							<a href="#">
								<i class="fa fa-reorder"></i>
							</a>
						</li>
					</ul>
				</div>
			</header>
		</div>