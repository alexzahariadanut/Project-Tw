<?php
	include 'db_connection.php';
	$conn = OpenCon(); // stabilirea conexiunii
	
	session_start();
	$username=$_SESSION['utilizator']; // userul curent
	

	if(isset($_POST['submit']))
	{	
		$moneyValue=$_POST['money'];
		$product_id=$_POST['row_id'];
		$minimumBid=$_POST['min_bid'];
		$categoryName=$_POST['catname'];
		
		if($moneyValue >= $minimumBid)
		{
			$sql_find_id = "SELECT user_id from users where username like '%".$username."%'";
			$result_find_id = mysqli_query($conn,$sql_find_id);
			$row_find_id = mysqli_fetch_array($result_find_id);
			$id_user=$row_find_id['user_id'];
	
			$sql_find_auctionid = "SELECT auctions.auction_id from auctions join products on auctions.product_id=products.product_id where products.product_id = ".$product_id;
			$result_find_auctionid = mysqli_query($conn,$sql_find_auctionid);
			$row_find_auctionid = mysqli_fetch_array($result_find_auctionid);
			$auction_id=$row_find_auctionid['auction_id'];

			$sql_insert = "INSERT INTO bids (bidder_id,auction_id,bid_amount) VALUES (".$id_user.",".$auction_id.",".$moneyValue.")";
			mysqli_query($conn, $sql_insert);
		}
	//$url="produs.php?category_name=".$categoryName;
	header("Location:produs.php?category_name=$categoryName"); // dupa apasarea butonului Place Bid se face redirectarea catre categories.php
   }
   else 
	   echo 'Eroare  ';
?>