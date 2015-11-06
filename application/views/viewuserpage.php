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
		<div class="icon">
			<img class="simpleicon" src="<?php echo base_url("images/simpleicon.png");?>">
		</div>
		<div style="padding:3%; float:left">
			
		</div>
		<div class="searchleft">
			<form role="form" method="POST" action="<?php echo base_url("index.php/admin/searchUser")?>">
				<input name="searchkey" placeholder="search here" class="form-control"/>
				<input type="hidden" name="username" value="<?php echo $admin['username'];?>" class="form-control"/>
			</form>
		</div>

		<div class="searchright">
			<img class="simpleicon" src="<?php echo base_url("images/search.png");?>">
		</div>
	</div>

	<div class="top">
	</div>
	<div class="top">
	</div>
	<div class="top">
		<a href="<?php echo base_url('index.php/admin');?>">
			<img class="topicon" src="<?php echo base_url("images/logout.png");?>">
		</a>
	</div>
	
	<div class="top">
		<?php $string = "index.php/admin/reloadHomePage/".$admin['username'] ?>
		<a href="<?php echo base_url($string)?>">
			<img class="topicon" src="<?php echo base_url("images/home.png");?>">
		</a>
	</div>
	
</div>

<div class="container">
	<div class="searchresult">
		<div class="jumbotron">
			<div>
				<h5>
					<span class="hello"> 
						<?php echo $data['username'];?>
					</span>
				</h5>
			</div>

			<hr>
			<img class="pp" src="
				<?php 
					$string = $data['photoprofile'];
					echo base_url($string);
				?>
			">

			<div class="bio">
				<h3>
					Username &ensp;:  
					<span class="info"> <?php 
					echo $data['username'];
					?></span>
				</h3>
			</div>

			<div class="bio">
				<h3>
					Full Name &ensp;:  
					<span class="info"> <?php 
					echo $data['fullname'];
					?></span>
				</h3>
			</div>

			<div class="bio">
				<h3>
					e-mail &ensp;&ensp;&ensp;&ensp; :  
					<span class="info"> <?php 
					echo $data['email'];
					?></span>
				</h3>
			</div>

			<div class="bio">
				<h3>
					Occupation :  
					<span class="info"> 
						<?php 
							if ($data['occupation']=="") {
								echo "-";
							} else {
								echo $data['occupation'];	
							}
							
						?>
					</span>
				</h3>
			</div>

			<div class="bio">
				<h3>
					Birthdate &ensp;&ensp;:  
					<span class="info"> 
						<?php 
							if ($data['birthdate']=="") {
								echo "-";
							} else {
								echo $data['birthdate'];	
							}
						?>
					</span>
				</h3>
			</div>

			<div class="bio">
				<h3>
					Status&ensp;&ensp;&ensp;&ensp;&ensp;:  
					<span class="info">
						<?php 
							echo $data['relationship'];
						?>
					</span>
				</h3>
			</div>

			<br><br><hr>
		</div>
	</div>
	
</div>
<div class="footer">
	<h1></h1>
    <em>&copy; 2015</em>
</div>

</body>
</html>