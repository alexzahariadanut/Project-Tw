			<?php
				include 'db_connection.php';
 
				$conn = OpenCon();
			?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="description" content="The MDN Web Docs Learning Area aims to provide complete beginners to the Web with all they need to know to get started with developing web sites and applications.">
		<meta name="keywords" content="Web design">
		<meta name="author" content="Alex Zaharia,Sima Paul,Rebegea Bogdan,Iulian Crisnuta">
		<title>AuctioX | Produs</title>
		<link rel="stylesheet" href="./css/style2.css"> 
	</head>
	<body>
		<header>
			<div class="container">
				<div id="branding">
					<h1><a href="index.html"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About us</a></li>
					<li class="current"><a href="categories.html">Categories</a></li>
					<li><a href="login.html">Login</a></li>
					<li ><a href="register.html">Register</a></li>
					<li><a href="account.html">My Account</a></li>
				
				
				</ul>
				</nav>
			</div>
		</header>
		
		<section id="newsletter">
			<div class="container">
				<form>
					<input type="search" name="q" placeholder="What are you looking for?">
					<button type="Submit" class="button_1">Search</button>
				</form>
			
			</div>
		</section>
		
		<section id="main">
			<div class="container">		
						<?php
				$sql="select * from products join categories on products.category_id=categories.category_id where categories.category_name='Masini' order by product_id asc";
				$result=mysqli_query($conn,$sql);
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
			
		
		</fo