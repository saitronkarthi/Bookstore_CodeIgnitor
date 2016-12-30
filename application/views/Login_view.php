<html>
	<head>
		<title>Cheap Books-cheapbooks.com - Login</title>
		
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
	<div class="jumbotron text-center">
		<h2> Welcome  to Cheapbooks.com- Online Bookworld </h2>
		<h4>Name: Karthikeyan Rajamani<br>UTA ID: 1001267157</h4>
		
		</div>
		<div class="container" align="center" style ='background-color: #abd8c1;'> 
			<form  method="post" action="<?= site_url('login/chkUser') ?>"  id="login"> 
				<div>
				<h3>Please login to continue</h3>
					<p>
						<label>Enter Username *: </label>
						<input type="text" name="username" id="username" required autofocus><br>
					</p>
					<p>
						<label>Enter Password *: </label>
						<input type="password" name="password"  id="password" required><br>
					</p>
					<p>
						<input type="submit" name="login" id="blogin" value="Login" class="btn btn-success">
					</p>
					<br>
					<p>
						<h4><?php echo $loginmsg ?></h4>
					</p>
				
					
				</div>
			</form>
						<p>
						<label>New Users Register Here-></label>
						<button onClick="window.location.href = '<?php echo base_url();?>index.php/register';return false;" class="btn btn-success">Register</button>
					</p>
		</div>
	</body>
</html>