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
    $stmt = $conn->prepare("INSERT INTO products (product_name, product_description,seller_id, category_id, image) 
    VALUES (?,?,?,?,?);");
    $stmt->bind_param("ssiib", $product_name, $product_description, $seller_id_products, $category_id, $image);

	
	/*	$stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':product_description', $product_description);
    $stmt->bindParam(':seller_id', $seller_id_products);
	$stmt->bindParam('category_id', $category_id);
	$stmt->bindParam('image', $image);*/

    // insert into products
    $product_name = test_input($_POST['name']);
    $product_description = test_input($_POST['description']);
	$afisare=$_SESSION['utilizator'];
	$sql = "SELECT user_id FROM users WHERE username ='$afisare'"; //extrag user id din sesiune
	$result = mysqli_query($conn, $sql);
    $seller_id_products= test_input($result);
	
	$category_name = test_input($_POST['category']); //extrag id-ul categoriei
	$sql = "SELECT category_id FROM categories WHERE category_name = '$category_name'";
	$result = mysqli_query($conn,$sql);
	$category_id= test_input($result);
	
	$image = $_POST['pictures'];
    $stmt->execute();
    
	
	// prepare sql and bind parameters for auctions
    $stmt = $conn->prepare("INSERT INTO auctions (product_id, seller_id, end_date) 
	VALUES (?,?,?);");
	$stmt->bind_param("iis", $product_id, $seller_id_auctions, $end_date);
	/*
	$stmt->bindParam(':product_id',$product_id);
	$stmt->bindParam(':seller_id', $seller_id_auctions);
	$stmt->bindParam(':start_date',$start_date);
	$stmt->bindParam(':end_date',$end_date);*/

    // insert into auctions
	$sql = "SELECT product_id FROM products WHERE seller_id = '$seller_id_products'";  //select id-ul produsului
	$result = mysqli_query($conn,$sql);
    $product_id = $result ;
    
	$seller_id_auctions = $seller_id_products;
    $end_date = $_POST["date"];
    $stmt->execute();
	
	//prepare sql and bind parameters for bids
	$stmt = $conn->prepare("INSERT INTO bids (bidder_id, auction_id, bid_amount, bid_time) 
	VALUES (?,?,?,?)");
	$stmt->bind_param("iiis", $bidder_id, $auction_id, $bid_amount, $bid_time );
	
	//insert into bids 
	$bidder_id = $seller_id;
	
	$sql = "SELECT auction_id from auctions WHERE seller_id = '$seller_id'";
	$result = mysqli_query($conn,$sql);
	$auction_id = $result;
	$bid_amount = $_POST['startingPrice'];
	$bid_time = date('Y-m-d H:i:s ', time());
	
	$stmt->close();
	$conn->close();
    echo "New item added successfully! You will be redirected in 5 seconds";
	
	
	
    }
	header('location: inventory.php');
	exit();
    sleep(5);

?>