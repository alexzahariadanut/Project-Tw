<?php
	include 'header.php';
?>

<?php
				include 'db_connection.php';
 
				$conn = OpenCon();
			?>
			
<section id="showcase">
			<div class="container">
				<h1>AuctioX   Professional   Website</h1>
				<p>Buyers come prepared to buy – they want the items being sold!</p>
			</div>	
		</section>
		
		<section id="newsletter">
			<div class="container">
			<form action="search.php" method="POST">
				<input  type="text" name="search" placeholder="Search">
				<button type="submit" name="submit-search" class="button_1">Search</button>
			</form>

				
		</section>			
		
<h1>Search page</h1>
<section id="main">
			<div class="container">
				<?php
				
	if(isset($_POST['submit-search']))
	{
		$search = mysqli_real_escape_string($conn, $_POST['search']);
		$sql = "Select * from products where product_name LIKE '%$search%' or product_description like '%$search%' 
		or seller_id like '%$search%' or category_id like '%$search%'";
		$result = mysqli_query($conn,$sql);
		$queryResult = mysqli_num_rows($result);
		
		echo "<h1>There are ".$queryResult. " results!</h1>";
		
		if($queryResult < 0 )
			echo "There are no results matching your search!";		
		
		
	}
				while($row=mysqli_fetch_array($result))
				{
						?>
			<div class="grid-produs">
					<p id="nume-produs"> <?php echo $row['product_name']; ?> </p>
					<?php
						$imageData = $row['image'];
						echo '<img alt="" id="imagine-produs" src="data:image/jpeg;base64,'.base64_encode( $imageData ).'"/>';
					?> 
					<p id="descriere-produs"> <?php echo $row["product_description"]; ?> </p>
					<p id="current-price">Current price :<?php 
															 $sql2="select MAX(bids.bid_amount) from bids join auctions on auctions.auction_id=bids.auction_id join products on auctions.product_id=products.product_id where auctions.product_id=" .$row['product_id']." group by bids.auction_id"; 
															 $result2=mysqli_query($conn,$sql2);
																	$row2=mysqli_fetch_array($result2);
																	$currentPrice=$row2['MAX(bids.bid_amount)'];
																	echo $currentPrice;
														?> 
					$</p>
					<p id="min-bid">Minimum Bid :<?php 
													$minBid=$currentPrice+10;
													echo $minBid;
												 ?>
					$</p>
					<form id="place-bid" action="placebid.php" method="post">
						Your Bid:<br>
						<input type="text"  placeholder="$$$" name="money">
						<input type="Submit" class="button_bid" name="submit" value="Place Bid">
					</form>
					
					
            </div>
            <?php
				}
			?>
				
			</div>
		</section>
		<footer>
			<p>AuctioX Web Page,Copyright &copy; 2018</p>
			
		
		</footer>