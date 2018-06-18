<?php
session_start();
include 'db.php';
$product_id=$_GET['productID'];
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
					<h1><a href="index.php"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li><a href="indexafterlogin.php">Home</a></li>
					<li><a href="aboutafterlogin.php">About us</a></li>
					<li><a href="categoriesafterlogin.php">Categories</a></li>
					<li class="current"><a href="accountafterlogin.php">My Account(<?php echo $_SESSION['utilizator']?>)</a></li>
					<li><a href="logout.php">
					Logout</a></li>
				</ul>
				</nav>
			</div>
		</header>
		
		<section id="newsletter">
			<div class="container">
				<form action="search.php">
					<input type="search" name="q" placeholder="Search" required>
					<button type="Submit" class="button_1">Search</button>
				</form>
			
			</div>
		</section>
		
		<section id="main">
			<div class="container">		
			<?php
			$sql="select * from products where product_id=$product_id";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result);
			{   $current_date = date('Y-m-d H:i:s ', time());
						$sellerID=$row['seller_id']; // cine vinde produsul
			
						$sql_auction="select * from auctions join products on auctions.product_id=products.product_id where products.product_id=".$row['product_id'];
						$result_sql_auction=mysqli_query($conn,$sql_auction);
						$row_result_sql_auction=mysqli_fetch_array($result_sql_auction);  // detalii despre licitatia produsului 
					
						 
							
				?>
				
			<div class="grid-produs">
				<p id="nume-produs">  <?php echo $row['product_name']; ?> </p>
				
				<?php
						$imageData = $row['image'];
						echo '<img alt="" id="imagine-produs" src="data:image/jpeg;base64,'.base64_encode( $imageData ).'"/>'; // preia imaginea din coloana img de tip BLOB din tabelul products
				?> 
				
				<p id="descriere-produs"> 
					[ End Time : 	
					<?php 
						echo $row_result_sql_auction['end_date']; 
						$timezone = date_default_timezone_get(); // timezone-ul serverului
						echo " The current server timezone is: " . $timezone;
					?> ] 
				</p>
				<p id="descriere-produs">  <?php echo $row["product_description"]; ?> </p>
				<p id="current-price">Current price :
					<?php 
						$sql2="select bidder_id,MAX(bids.bid_amount) from bids join auctions on auctions.auction_id=bids.auction_id join products on auctions.product_id=products.product_id where auctions.product_id=" .$row['product_id']." group by bids.auction_id"; 
						$result2=mysqli_query($conn,$sql2); 
						$row2=mysqli_fetch_array($result2);          // pretul curent este cel mai mare bid din tabelul bids corespunzatorul produsului
						$currentPrice=$row2['MAX(bids.bid_amount)']; // in cazul in care nu a fost plasat nici un bid current price va fi un pret minim stabilit de vanzator in momentul in care completaza formularul de upload, acesta va fi implicit adaugat in tabelul bids
						$winnerID=$row2['bidder_id'];		// ID-ul userului cu cel mai mare bid corespunzator produsului (poate fi vanzatorul)
						echo $currentPrice;
					?>$ 
				</p>
				<p id="min-bid">Minimum Bid :
					<?php 
						$minBid = $currentPrice + 10; 
						echo $minBid;
					?>$
				</p>
				<form id="place-bid" action="placebidAtom.php?placeBidProductId='.$row['product_id'].'" method="post" > <!-- Fiecare buton va avea id-ul prodsului corespunzator -->
					Your Bid:<br>
					<input type="number" min=<?php echo $minBid; ?>  placeholder="$$$" name="money" required> <!-- Validarea datelor: va permite doar adaugarea numerelor mai mari decat minBid -->
					<input type="Submit" class="button_bid" name="submit" value="Place Bid">
					<input type=hidden id='rowid' value="<?php echo $row['product_id']; ?>" name='row_id'> <!-- folosit pentru a trimite id-ul produsului catre placeBid.php -->
					<input type=hidden id='minbid' value="<?php echo $minBid; ?>" name='min_bid'>
					<input type=hidden id='catname' value="<?php echo $category_name; ?>" name='catname'> <!-- trasmite catre placeBid.php categoria -->
				</form>						
            </div>
            <?php
                          
					}
			?>

				
			</div>
		</section>
		<footer>
			<article>AuctioX Web Page,Copyright &copy; 2018</article>
		</footer>
	</body>
</html>
