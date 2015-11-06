<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Mini Social Media</title>
	<link rel="icon" type="image/png" href="<?php echo base_url("images/simpleicon.png");?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link  rel="stylesheet" href="<?php echo base_url("assets/css/style.css");?>"/>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</head>
<body>
<div class="toppage">
	<div class="title">
		<span>
			<img class="simpleicon" src="<?php echo base_url("images/simpleicon.png");?>">
		</span>
		<span>Mini Media Social</span>
	</div>
	<form role="form" method="POST" action="<?php echo base_url("index.php/homepage");?>">
		<div class="topfill">
			<label>
				username
			</label>
			<input name="username" class="form-control"/>
		</div>
		<div class="topfill">
			<label>
				password
			</label>
			<input name="password" class="form-control" type="password"/>
			<a href="#" class="forgotpwd">Forgot password?</a>
		</div>
		<div class="submittop">
			<button id="singlebutton" name="singlebutton" class="btn btn-primary">
				sign in
			</button>
		</div>
	</form>
</div>

<div class="container">
	<div class="left">
		<div class="logoimage">
			<img class="logo" src="<?php echo base_url("images/logo.png");?>">
		</div>
		<h2><i>"Boost your social networking and sharing"</i></h2>
	</div>
	<div class="right">
		<h3 class="text-center">
			<p style="text-decoration:bold; font-size:150%; color:#008B00">
				New here?<br />
			</p>
			<p style="font-size:100%; color:#334C4C">Get Started! It's Free</p>
		</h3>
		<br>
		<form role="form" method="POST" action="<?php echo base_url("index.php/web/insertUser")?>">
			<div class="form-group">
				<label>
					Fullname
				</label>
				<input name="fullname" class="form-control"/>
			</div>
			<div class="form-group">
				<label>
					Username
				</label>
				<input name="username" class="form-control"/>
			</div>
			<div class="form-group">
				<label>
					Email
				</label>
				<input name="email" class="form-control" type="email"/>
			</div>
			<div class="form-group">
				<label>
					Password
				</label>
				<input name="password" class="form-control" type="password" />
			</div>
			<div class="form-group">
				<label>
					Status
				</label>
			    <select id="selectbasic" name="selectbasic" class="form-control">
			      <option value="1">Single</option>
			      <option value="2">In a relationship</option>
			      <option value="3">Engaged</option>
			      <option value="4">Married</option>
			      <option value="5">In a civil union</option>
			      <option value="6">It is complicated</option>
			      <option value="7">Separated</option>
			      <option value="8">Divorced</option>
			      <option value="9">Widowed</option>
			      <option value="10">In a domestic partnership</option>
			    </select>
			 </div>
			 <center>
			<button type="submit" class="btn btn-primary" style="margin-top:4%;">
				Submit
			</button>
			</center>
		</form>
	</div>
</div>
<div class="footer">
	<h1></h1>
	<a href="<?php echo base_url("index.php/admin")?>">admin login</a>
    <em>&copy; 2015</em>
</div>

</body>
</html>