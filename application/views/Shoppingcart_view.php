<html>
	<head>
		<title>User Shopping Cart - CHEAPBOOKS</title>
				  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</head>
	<body >
		<form  method="post" action="<?= site_url('shoppingcart/buttonevent') ?>"  id="scart">				
			<div align="right" style ='background-color: #abd8c1;'>
				<p>
					<input type="submit" name="logout" id="logout" value="Logout" class="btn btn-success" >
					&nbsp;
					&nbsp;
					<input type="submit" name="search" id="search" value="Go to Search" class="btn btn-success">&nbsp;&nbsp;
				</p>
				<hr noshade="noshade" />
			</div>
		</form>
		<div>
			<h2>User Shopping Cart</h2>
		<p> <?php echo $cartres ?> </p>
		<form method="post" action="<?= site_url('shoppingcart/buy') ?>"   id="acart">
			<table border="1" class="table table-striped">
					<thead>
						<tr>
							<td>Item.No</td>
							<td>Book Title</td>
							<td>ISBN</td>
							<td>Author</td>
							<td>Cost</td>
							<td>Copies Purchased </td>				
						</tr>
					</thead>
					<tbody>
		
			          <?php
			          if(isset($this->session->userdata['ccount']))
			          {
			                  
			            if( !empty($cresult) )
			               {
                     $count = 1;
			    foreach($cresult as $store)
			    {
			    	?>
			      

			         <tr>
							<td>
								<?php echo $count ?>
							</td>
							<td>
								<?php echo $store-> title ?>
							</td>
							<td>
								<?php echo $store-> isbn ?>
							</td>
							<td>
								<?php echo $store-> name ?>
							</td>
							<td>
								<?php echo $store-> price ?>
							</td>
								<td>
								<?php echo $store-> number ?>
							</td>
							
							<?php
									 $count++;
								?>
												
							</td>
				
							
						</tr> 
						
			 <?php			
			    }
			}
			
			?>
			           <tr>
							<td colspan="6" align="right">Grand total:&nbsp;$<?php echo $totalPrice ?></td>
						</tr>
						</tbody>
						</table>
						<p>
						<input type="submit" name="addcart" value="Buy Items" class="btn btn-success" id="addcart">
						</p>
						 <?php			
			    
						}
						
						?>
						</form>
						</div>

		
	</body>
</html>