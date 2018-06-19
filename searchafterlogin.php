
<?php
				include 'db_connection.php';
				Session_start();
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
		<title>AuctioX | Welcome</title>
		<link rel="stylesheet" href="./css/alex2.css"> 
	</head>
	<body>
	
	    
		<header>
			<div class="container">
				<div id="branding">
					<h1><a href="indexafterlogin.php"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li><a href="indexafterlogin.php">Home</a></li>
					<li><a href="aboutafterlogin.php">About us</a></li>
					<li><a href="categoriesafterlogin.php">Categories</a></li>
					<li><a href="accountafterlogin.php">My Account(<?php echo $_SESSION['utilizator']?>)</a></li>
					<li><a href="logout.php">
					Logout</a></li>
					
				
				
				</ul>
				</nav>
			</div>
		</header>
		
		

	<section id="showcase">
			<div class="container">
				<h1>AuctioX   Professional   Website</h1>
				<p>Buyers come prepared to buy – they want the items being sold!</p>
			</div>	
		</section>
		
		<section id="newsletter">
			<div class="container">
			<form action="searchafterlogin.php" method="POST">
				<input  type="text" name="search" placeholder="Search" required>
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
		$sql = "Select * from products join auctions on products.product_id=auctions.product_id where product_name LIKE '%$search%' or product_description like '%$search%' or grad_uzura like '%search%' or
		end_date like '%$search%'";
		$result = mysqli_query($conn,$sql);
		$queryResult = mysqli_num_rows($result);
		if($queryResult <1 )
			echo "<h1>There are no results matching your search!</h1>";
	
		$current_date = date('Y-m-d H:i:s ', time()); // formatul servererului dupa care s-a introdus timestamp in auctions.end_time
		$cautare=mysqli_query($conn,$sql);
		
		while($row=mysqli_fetch_array($cautare))
				{		
						$sql_auction="select * from auctions join products on auctions.product_id=products.product_id where products.product_id=".$row['product_id'];
						$result_sql_auction=mysqli_query($conn,$sql_auction);
						$row_result_sql_auction=mysqli_fetch_array($result_sql_auction);  // detalii despre licitatia produsului 
						if($queryResult > 0 )
								if($current_date < $row_result_sql_auction['end_date'])
								{	
									echo "<h1>The results are : </h1>";
									break;
									
								}
								else 
								{	
									echo "<h1>There are no results matching your search!</h1>";
									break;
									
								}
				

				}
	}
				while($row=mysqli_fetch_array($result))
				{
					$current_date = date('Y-m-d H:i:s ', time()); // formatul servererului dupa care s-a introdus timestamp in auctions.end_time	
					
					
				
					$result=mysqli_query($conn,$sql); // toate coloanele din tabelul products  pentru produsele din categoria transmisa prin $category_name
				
					while($row=mysqli_fetch_array($result)) // pentru fiecare produs
					{   
						$sellerID=$row['seller_id']; // cine vinde produsul
			
						$sql_auction="select * from auctions join products on auctions.product_id=products.product_id where products.product_id=".$row['product_id'];
						$result_sql_auction=mysqli_query($conn,$sql_auction);
						$row_result_sql_auction=mysqli_fetch_array($result_sql_auction);  // detalii despre licitatia produsului 
						
						$auction_id = $row_result_sql_auction['auction_id'];
						
						$sql2="select bidder_id,MAX(bids.bid_amount) from bids join auctions on auctions.auction_id=bids.auction_id join products on auctions.product_id=products.product_id where auctions.product_id=" .$row['product_id']." group by bids.auction_id"; 
						$result2=mysqli_query($conn,$sql2); 
						$row2=mysqli_fetch_array($result2);          // pretul curent este cel mai mare bid din tabelul bids corespunzatorul produsului
						$currentPrice=$row2['MAX(bids.bid_amount)']; // in cazul in care nu a fost plasat nici un bid current price va fi un pret minim stabilit de vanzator in momentul in care completaza formularul de upload, acesta va fi implicit adaugat in tabelul bids
						$winnerID=$row2['bidder_id'];		// ID-ul userului cu cel mai mare bid corespunzator produsului (poate fi vanzatorul)
						
						
						 if( $current_date < $row_result_sql_auction['end_date'] ) //  daca licitatia este in desfasurare
							{	
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
						else // licitatia s-a incheiat
							{						
							 $sql_find_transaction = "SELECT * FROM transactions WHERE transactions.auction_id='$auction_id'";
							 $result_find_transaction = mysqli_query($conn,$sql_find_transaction);
							if( mysqli_num_rows($result_find_transaction) > 0) // s-a gasit in transaction licitatia cu id-ul $auction_id
							{
									
							}
							else // nu se afla in transactions
								{	if ( $sellerID != $winnerID ) // nu se face tranzactia daca nu a licitat nimeni pentru produs 
									{	
										$sql_insert_transaction="INSERT INTO transactions ( seller_id, buyer_id,auction_id,amount_of_money) VALUES ( '$sellerID','$winnerID','$auction_id','$currentPrice')";
										mysqli_query($conn, $sql_insert_transaction);
									}
									
								} 
							}
					}
			?>

				
			</div>
            <?php
				}
			?>
				
			</div>
		</section>
		<footer>
			<p>AuctioX Web Page,Copyright &copy; 2018</p>
			
		
		</footer>
