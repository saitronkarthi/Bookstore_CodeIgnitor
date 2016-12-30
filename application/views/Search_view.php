<html>
	<head>
		<title>Cheap Books-cheapbooks.com - Login</title>
		
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>


		<div style ='background-color: #abd8c1;'>
			<form method="post" action="<?= site_url('search/buttonprocess') ?>"   id="fsearch">
				<div align="right" class="form-group">
					<p>
						<input type="submit" name="logout" id="logout" value="Logout" class="btn btn-success" >&nbsp;&nbsp;
						<input type="submit" name="basket" id="basket" value="Shopping Basket"  class="btn btn-success" >&nbsp;&nbsp;
						<input type="text" name="count" id="count" value="<?php echo $cartcount ?>" >
					</p>
					<hr noshade="noshade" />
				</div>
			</form>
			
			<div>
				<form action="<?= site_url('search/searchprocess') ?>"" name="searchbook" method="post" id="bsearch">
					<h2>Search Books</h2>
					<p>
					<textarea name="search" id="search" placeholder="Enter Book Title or Author Name" rows="3" cols="50"></textarea>
					</p>
					<p>
						<input type="submit" name="title" value="Search by Title" class="btn btn-success" id="title">&nbsp;&nbsp;
						<input type="submit" name="author" value="Search by Author" class="btn btn-success" id="author">
					</p>

				</form>
             </div>
			</div>	
			<div>
			<form method="post" action="<?= site_url('search/addcart') ?>"   id="acart">
			<table border="1" class="table table-striped">
					<thead>
						<tr>
							<td>Select</td>
							<td>Book Name</td>
							<td>ISBN Number</td>
							<td>Author</td>
							<td>Price</td>
							<td>Copies Available </td>
							<td>Copies Required </td>
						
							
						</tr>
					</thead>
					<tbody>
		
			          <?php
			                  
			            if( !empty($sresult) )
			               {

			    foreach($sresult as $store)
			    {
			    	?>
			      

			         <tr>
							<td>
								<input type="radio" name="CartItems" id="<?php echo $store->isbn ?>" value="<?php echo $store->isbn ?>">
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
							<td>
							<select name="CartItemsCount" id="CartItemsCount">
							<?php
							        $drow=$store-> number;
									for ($resrownum = 1; $resrownum <= $drow; $resrownum++) :  ?>
								
							<option value="<?php echo $resrownum ?>"><?php echo $resrownum ?></option>
							<?php 
									endfor;
								?>
                            </select>
                            								
							</td>
				
							
						</tr> 
			 <?php			
			    }
			}
			?>
						</tbody>
						</table>
						<p>
						<input type="submit" name="addcart" value="Add Items to Cart" class="btn btn-success" id="addcart">
						</p>
						</form>
						</div>	
		

	</body>
</html>