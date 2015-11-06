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
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
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
		</a>
	</div>

	<div class="top">
		<?php $string = "index.php/homepage/reloadHomePage/".$data['username'] ?>
		<a href="<?php echo base_url($string)?>">
			<img class="topicon" src="<?php echo base_url("images/home.png");?>">
		</a>
	</div>
	
</div>

<div class="container">
	<div class="searchresult">
		<div class="jumbotron">
			<div>
				<h5 style="text-align:center;">
					<span class="hello">
						<?php 
							echo $data['fullname'];
						?>
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
			<?php $string = "index.php/homepage/updateUser/".$data['username']; ?>
			<form role="form" enctype="multipart/form-data" method="POST" action="<?php echo base_url("$string")?>">
				<div class="bio">
					<h3>
						Username &ensp;:&ensp;
						<span class="info"> <?php 
						echo $data['username'];
						?></span>
					</h3>
				</div>

				<div class="bio">
					<h3>
						<div class="editleft">
							Full Name &ensp;:  
						</div>
						<div class="editright">
							<input name="fullname" class="form-control" placeholder="<?php echo $data['fullname'];?>"/>
						</div>
					</h3>

				</div>

				<div class="bio">
					<h3>
						<div class="editleft">
							Password
						</div>
						<div class="editright">
							<input name="password" class="form-control" type="password" />
						</div>
				</div>

				<div class="bio">
					<h3>
						<div class="editleft">
							e-mail &ensp;&ensp;&ensp;&ensp; :  
						</div>
						<div class="editright">
							<input name="email" class="form-control" placeholder="<?php echo $data['email'];?>"/>
						</div>
					</h3>
				</div>

				<div class="bio">
					<h3>
						<div class="editleft">
							Occupation :
						</div>  
						<div class="editright">
							<input name="occupation" class="form-control" placeholder="
								<?php 
									if (isset($data['occupation'])&& !empty($data['occupation'])) {
										if ($data['occupation']=="") {
											echo "-";
										} else {
											echo $data['occupation'];	
										}
									} else {
										echo "-";
									}
									
								?>
							"/>
						</div>
					</h3>
				</div>

				<div class="bio">
					<h3>
						<div class="editleft">
							Birthdate &ensp;&ensp;:  
						</div>
						<div class="editright"> 
						        <div class="input-group date">
							      <input name="birthdate" type="text" class="form-control" placeholder="yyyy-mm-dd">
							      <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
							    </div>
						</div>
					</h3>
				</div>

				<div class="bio">
					<h3>
						<div class="editleft">
							Status&ensp;&ensp;&ensp;&ensp;&ensp;:  
						</div>
						<div class="editright"> 
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
					</h3>
				</div>

				<div class="bio">
				 	<h3>
						<div class="editleft">
							Edit Photo &ensp;:
						</div>
						<div class="editright"> 
							<input name="profilepicture" type="file" />
						</div>
					</h3>
				</div>
				<div class="submitbutton">
					<button type="submit" class="btn btn-primary btn-lg">
						Submit
					</button>
				</div>
			</form>
			<br><hr>
		</div>
	</div>
</div>
<div class="footer">
	<h1></h1>
    <em>&copy; 2015</em>
</div>

</body>
<script type="text/javascript">
	$('#sandbox-container .input-group.date').datepicker({
        toggleActive: true
    });

</script>
</html>