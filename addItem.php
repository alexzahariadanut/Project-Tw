<?php
	
	session_start();
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "auctiox";
	
	if(isset($_POST['submit']))
	{
		
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}	
    $conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}

    // prepare sql and bind parameters for products
    $stmt = $conn->prepare("INSERT INTO products (product_name, product_description,seller_id, category_id) 
    VALUES (?,?,?,?);");
    $stmt->bind_param("ssii", $product_name, $product_description, $seller_id_products, $category_id);

	
	/*	$stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':product_description', $product_description);
    $stmt->bindParam(':seller_id', $seller_id_products);
	$stmt->bindParam('category_id', $category_id);
	$stmt->bindParam('image', $image);*/

    // insert into products
    $product_name =$_POST['name'];
	echo "product name :".$product_name."<br>";
    $product_description = $_POST['description'];
	echo "product desc:".$product_description."<br>";
	$afisare=$_SESSION['utilizator'];
	echo "username :".$afisare."<br>";
	
	$sql = "SELECT user_id FROM users WHERE username ='$afisare' LIMIT 1"; //extrag user id din sesiune
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	echo "user_id".$row['user_id']."<br>";
    $seller_id_products= $row['user_id'];
	
	$category_name = $_POST['category']; //extrag id-ul categoriei
	echo "category_name :".$category_name."<br>";
	$sql = "SELECT category_id FROM categories WHERE category_name = '$category_name'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$category_id= $row['category_id'];
	echo "category id :".$category_id."<br>";
	
	//$image = addslashes(file_get_contents($_FILES['pictures']));
    $stmt->execute();
    
	
	// prepare sql and bind parameters for auctions
    $stmt1 = $conn->prepare("INSERT INTO auctions (product_id, seller_id, end_date) 
	VALUES (?,?,?);");
	$stmt1->bind_param("iis", $product_id, $seller_id_auctions, $end_date);
	/*
	$stmt->bindParam(':product_id',$product_id);
	$stmt->bindParam(':seller_id', $seller_id_auctions);
	$stmt->bindParam(':start_date',$start_date);
	$stmt->bindParam(':end_date',$end_date);*/

    // insert into auctions
	$sql = "SELECT product_id FROM products WHERE seller_id = '$seller_id_products' ORDER BY product_id DESC";  //select id-ul produsului
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
    $product_id = $row['product_id'] ;  
	echo "product_id :".$product_id."<br>";
     
	$seller_id_auctions = $seller_id_products;
    //$end_date = $_POST["date"];
	//$end_date = date('Y-m-d H:i:s ', $date);
	//echo "end date: ".$end_date;
	$end_date_form = $_POST['end_date'];
	$timestamp = strtotime($end_date_form);
	$end_date = date("Y-m-d H:i:s", $timestamp);
    	$stmt1->execute();
	
	//prepare sql and bind parameters for bids
	$stmt2 = $conn->prepare("INSERT INTO bids (bidder_id, auction_id, bid_amount, bid_time) 
	VALUES (?,?,?,?)");
	$stmt2->bind_param("iiis", $bidder_id, $auction_id, $bid_amount, $bid_time );
	
	//insert into bids 
	$bidder_id = $seller_id_auctions;
	
	$sql = "SELECT auction_id from auctions WHERE seller_id = '$seller_id_auctions' ORDER BY auction_id DESC";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$auction_id = $row['auction_id'];
	echo "auction_id :".$auction_id."<br>";
	$bid_amount = $_POST['startingPrice'];
	$bid_time = date('Y-m-d H:i:s ', time());
	echo "bid time:". $bid_time;
	$stmt2->execute();
	
	
	
	$stmt->close();
	$stmt1->close();
	$conn->close();
    echo "New item added successfully! You will be redirected in 5 seconds";
	
	
	
    }
	header('location: inventory.php');
	//exit();
    //sleep(5);

?>
