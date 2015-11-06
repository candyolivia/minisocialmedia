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
<div class="frontadmin">
	<div class="baseform">
		<div class="adminlogin">
			<span>Welcome Mini Media Social's Administrator</span>
		</div>
		<hr><br>
		<div class="adminleft">
			<form role="form" method="POST" action="<?php echo base_url("index.php/admin/manageUser")?>">
				<div class="admin">
					<div>
						<label>
							username
						</label>
					</div>
					<input id="admin" name="username" class="form-control"/>
				</div>
				<div class="admin">
					<div>
						<label>
						password
						</label>
					</div>
					<input id="admin" name="password" class="form-control" type="password"/>
				</div>
				<div class="admin">
					<button id="singlebutton" name="singlebutton" class="btn btn-primary">
						<div style="font-size:120%; font-weight:bold">sign in</div>
					</button>
				</div>
			</form>
		</div>
		<div class="adminright">
			<img class="adminpic" src="<?php echo base_url("images/admin1.png");?>">
		</div>
		<div style="margin-bottom:100px">
		</div>
	</div>
</div>
<p style="padding-bottom:310px"></p>

<div class="footer">
	<h1></h1>
	<a href="<?php echo base_url("index.php/web")?>">user login</a>
    <em>&copy; 2015</em>
</div>

</body>
</html>