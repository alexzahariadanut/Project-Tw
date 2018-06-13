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
	$interogare=$_SESSION['utilizator'];
	$sql = "SELECT user_id FROM users WHERE username ='$interogare';"; //extrag user id din sesiune
	$result = mysql_query($conn,$sql);
    $seller_id_products= test_input($result);
	
	$category_name = $_POST['category']; //extrag id-ul categoriei
	$sql = "SELECT category_id FROM categories WHERE category_name = '$category_name'";
	$result = mysql_query($conn,$sql);
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
	$sql = "SELECT product_id FROM products WHERE ";  //select id-ul produsului
    $product_id = ;
    
	
	$seller_id_auctions = $seller_id_products;
    $end_date = $_POST["date"];
    $stmt->execute();
	$stmt->close();
	$conn->close();
    echo "New item added successfully! You will be redirected in 5 seconds";
	
	
	
    }
	header('location: inventory.html');
	exit();
    sleep(5);

?>