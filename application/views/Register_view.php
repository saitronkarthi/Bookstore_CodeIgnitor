<html>
	<head>
		<title>Cheap Books-cheapbooks.com - New User Registration</title>
		
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
		<body>
		<div class="container" style ='background-color: #abd8c1;'>
					<br>
			<h4><?php echo $msg ?></h4>
			
			<form action="<?= site_url('register/insertCustomer') ?>" name="register" id="register" method="post" > 
		
				<div>
					<table>
						<tr>
							<td>Username</td>
							<td><input type="text" name="username" id="username"  required autofocus class="form-control" >
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" class="form-control" name="password" id="password" required>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="text"  class="form-control" name="address" id="address">
						</tr>
						<tr>
							<td>Phone </td>
							<td><input type="text" name="phone" class="form-control" maxlength="15" id="phone">
						</tr>
						<tr>
							<td>email</td>
							<td><input type="email" class="form-control" name="email" id="email">
						</tr>
						<tr><td><br></td></tr>	
						<tr>
							<td><button onClick="window.location.href = '<?php echo base_url();?>index.php/login';return false;" class="btn btn-success">Login</button></td>
							<td><input type="submit" name="usrregister" id="usrregister" value="Register" class="btn btn-success"></td>
						</tr>		
					</table>
				</div>
			</form>
		</div>
	</body>
</html>