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
			<form role="form" method="POST" action="<?php echo base_url("index.php/searchpage")?>">
				<input name="searchkey" placeholder="search here" class="form-control"/>
				<input type="hidden" name="username" value="<?php echo $data['username'];?>" class="form-control"/>
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
		<a href="<?php echo base_url();?>">
			<img class="topicon" src="<?php echo base_url("images/logout.png");?>">
		</a>
	</div>
	
	<div class="top">
		<?php $string = "index.php/homepage/settingUser/".$data['username'] ?>
		<a href="<?php echo base_url("$string");?>">
		<img class="topicon" src="<?php echo base_url("images/setting.png");?>">
	</div>

	<div class="top">
		<?php $string = "index.php/homepage/reloadHomePage/".$user['username']; ?>
		<a href="<?php echo base_url($string)?>">
			<img class="topicon" src="<?php echo base_url("images/home.png");?>">
		</a>
	</div>
	
</div>

<div class="container">
	<div class="homeleft">
		<div class="jumbotron">
			<div>
				<h5>
					<span class="hello"> <?php 
					echo $data['fullname'];
					?></span>
				</h5>
			</div>
			<hr>
			<img class="profpic" src="
				<?php 
					$string = $data['photoprofile'];
					echo base_url($string);
				?>
			">

			<div class="biodata">
				<h3>
					Username &ensp;:  
					<span class="info"> <?php 
					echo $data['username'];
					?></span>
				</h3>
			</div>

			<div class="biodata">
				<h3>
					Full Name &ensp;:  
					<span class="info"> <?php 
					echo $data['fullname'];
					?></span>
				</h3>
			</div>

			<div class="biodata">
				<h3>
					e-mail &ensp;&ensp;&ensp;&ensp; :  
					<span class="info"> <?php 
					echo $data['email'];
					?></span>
				</h3>
			</div>

			<br><br><hr>
		</div>
	</div>
	<div class="homeright">
		<div class="friendtitle">
			Your Friends
		</div>
			<?php 
			$i = 0;
			foreach ($friend as $d) { 
				
			?>
			<div class="friendlist">
				<div class="pp">
					<img class="friendpic" src="
						<?php 
							$string = $d['photoprofile'];
							echo base_url($string);

						?>
					">
				</div>

				<?php $string = "index.php/homepage/viewFriendDetail/".$d['username']."/".$user['username'];?>
				<a href="<?php echo base_url($string)?>"class="friendname">
					<div >
						<?php echo $d['username'];?>
						
					</div>
				</a>
				<?php
					$i++;
					echo "<hr></div>";
					if($i>=6) {
						break;
					}
					
				}?>
			<div style="text-align:right; background-color:#F5F5F0; padding-right: 5%; padding-bottom: 5%;">
				<?php 
					$string = "index.php/searchpage/searchAll/".$data['username'];
				?>
				<a href="<?php echo base_url($string);?>">more...</a>
			</div>
		</div>
	</div>
</div>
<div class="footer">
	<h1></h1>
    <em>&copy; 2015</em>
</div>

</body>
</html>