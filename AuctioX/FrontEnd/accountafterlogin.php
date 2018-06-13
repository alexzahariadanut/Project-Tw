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
					<h1><a href="index.html"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li><a href="indexafterlogin.php">Home</a></li>
					<li><a href="aboutafterlogin.php">About us</a></li>
					<li><a href="categoriesafterlogin.php">Categories</a></li>
					<li class="current"><a href="account.html">My Account(<?php session_Start();echo $_SESSION['utilizator']?>)</a></li>
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
					<li><a href="payment.php"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> Payment</a></li>
				</ul>
			</div>
	</body>
</html>