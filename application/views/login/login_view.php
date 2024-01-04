<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Login</title>
		
		<!-- Error CSS -->
		<link href="<?php echo base_url();?>css/login.css" rel="stylesheet" media="screen">

		<!-- Animate CSS -->
		<link href="<?php echo base_url();?>css/animate.css" rel="stylesheet" media="screen">

		<!-- Font Awesome -->
		<link href="<?php echo base_url();?>fonts/font-awesome.min.css" rel="stylesheet">
		<style>
			body{
				
				background-repeat: no-repeat;
				background-size:cover;
			}
			.error > p 
			{
				color:red;
				    text-align: center;
			}
		</style>
	</head>
	<body>
			<?php echo form_open("Login/Validation");?>
			<div id="box" class="animated bounceIn">
					<div id="top_header">
						<a href="#">
							<img class="logo" src="<?php echo base_url();?>img/logo.png" alt="logo">
						</a>
						<h5>
							Sign in to continue to your<br />
							Admin Panel.
						</h5>
					</div>
					<div id="inputs">
						<div class="form-control"> 
							<div class="error"><?php echo form_error('user_name'); ?></div>
							<input type="text" placeholder="Email" name="user_name" value="<?php echo set_value('user_name'); ?>" >
							<i class="fa fa-envelope-o"></i>
						</div>
						<div class="form-control"> 
							<div class="error"><?php echo form_error('password'); ?></div>
							<input type="password" placeholder="Password"  name="password" value="<?php echo set_value('password'); ?>" >
							<i class="fa fa-key"></i>
						</div>
						<input type="submit" value="Sign In">
					</div> 
			</div>
		</form>
	</body>
</html>