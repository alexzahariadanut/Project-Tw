<?php 
	include 'db_connection.php'; 
	$conn = OpenCon();

	session_start();
	$username=$_SESSION['utilizator'];

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="keywords" content="Web design">
		<meta name="author" content="Alex Zaharia,Sima Paul,Rebegea Bogdan,Iulian Crisnuta">
		<title>AuctioX | My Account</title>
		<link rel="stylesheet" href="./css/style2.css"> 
		<link rel="stylesheet" href="./css/inventory.css">
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
					<li class="current"><a href="accountafterlogin.php">My Account(<?php echo $_SESSION['utilizator']?>)</a></li>
					<li><a href="logout.php">
					Logout</a></li>
				
				
				</ul>
				</nav>
			</div>
		</header>
		
			<div id="sidebar">
				
				<ul>
					<li><a href="accountafterlogin.php"> <img id="side-pics1" src="./img/myaccount.jpg" alt="Account Icon"> Account details</a></li>
					<li><a href="purchase_history.php"> <img id="side-pics2" src="./img/history.jpg" alt="Purchase History Icon"> Purchase history</a></li>
					<li><a href="inventory.php"> <img id="side-pics3" src="./img/inventory.jpg" alt="Inventory Icon"> Inventory</a></li>
					<li><a href="FormatAtom.php"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> Stiri In Format Atom</a></li>
					<li><a href="licitatii.xml"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> XML generare</a></li>
					<li><a href="json.php"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> JSON generare</a></li>
					<li><a href="pdf.php"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> PDF generare</a></li>
					licitatie generare</a></li>
				</ul>
			</div>
			
			<h1> Items details </h1>
<?php 
	$sql_user = "SELECT * FROM users where username='$username'";
	$res_user = mysqli_query($conn,$sql_user);
	if(mysqli_num_rows($res_user)>0)
	{
	while ($row = $res_user->fetch_assoc())
	$curr_user_id = $row['user_id'];
	$sql_transaction = "SELECT * FROM transactions WHERE buyer_id=".$curr_user_id;
	$res_transaction = mysqli_query($conn,$sql_transaction);
	while($row_transaction = mysqli_fetch_array($res_transaction))
	{
		echo "Tranzactia :".$row_transaction['transaction_id'];
	}
	}
	else
		echo 'Nu aveti nici un produs achizitionat inca';
?>
	</body>
</html>