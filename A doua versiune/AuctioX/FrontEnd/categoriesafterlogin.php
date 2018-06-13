<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="description" content="The MDN Web Docs Learning Area aims to provide complete beginners to the Web with all they need to know to get started with developing web sites and applications.">
		<meta name="keywords" content="Web design">
		<meta name="author" content="Alex Zaharia,Sima Paul,Rebegea Bogdan,Iulian Crisnuta">
		<title>AuctioX | Categories</title>
		<link rel="stylesheet" href="./css/style2.css"> 
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
					<li class="current"><a href="categoriesafterlogin.php">Categories</a></li>
					<li><a href="accountafterlogin.php">My Account(<?php session_Start();echo $_SESSION['utilizator']?>)</a></li>
					<li><a href="logout.php">
					Logout</a></li>
				
				
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
				<div class="slide-categorii-row1">
				<div class="slider">
					<a href="produs.php"><figure class="mobile">
						<img alt=""  src="./img/telefon1.jpg">
						<img  alt="" src="./img/telefon2.jpg">
						<img  alt="" src="./img/telefon3.jpg">
						<img  alt="" src="./img/telefon4.jpg">
						<img alt="" src="./img/telefon5.jpg">
						
					</figure></a>
					<a href="produs.php">Mobile Phones </a>
				</div>
				
				<div class="slider">
					<a href="produs2.html"><figure class="car">
						<img alt="" src="./img/car1.jpg">
						<img alt=""  src="./img/car2.jpg">
						<img  alt="" src="./img/car3.jpg">
						<img  alt="" src="./img/car4.jpg">
						<img  alt="" src="./img/car5.jpg">
						
					</figure>
					</a>
					<a href="index.html">Cars </a>
				</div>
				
					<div class="slider">
					<a href="produs3.html"><figure class="car">
						<img  alt="" src="./img/house1.jpg">
						<img  alt="" src="./img/house2.jpg">
						<img  alt="" src="./img/house3.jpg">
						<img  alt="" src="./img/house4.jpg">
						<img  alt="" src="./img/house5.jpg">
						
					</figure>
					</a>
					<a href="index.html">Houses </a>
				</div>
				
				</div>
				
				<div class="slide-categorii-row1">
				<div class="slider">
					<a href="produs4.html"><figure class="mobile">
						<img alt=""  src="./img/TV1.jpg">
						<img  alt="" src="./img/TV2.jpg">
						<img  alt="" src="./img/TV3.jpg">
						<img  alt="" src="./img/TV4.jpg">
						<img  alt="" src="./img/TV5.jpg">
						
					</figure>
					</a>
					<a href="index.html">TV </a>
				</div>
				
				<div class="slider">
					<a href="produs5.html"><figure class="car">
						<img  alt="" src="./img/PC1.jpg">
						<img  alt="" src="./img/PC2.jpg">
						<img  alt="" src="./img/PC3.jpg">
						<img  alt="" src="./img/PC4.jpg">
						<img  alt="" src="./img/PC5.jpg">
						
					</figure>
					</a>
					<a href="index.html">PC </a>
				</div>
				
								<div class="slider">
					<a href="produs6.html"><figure class="car">
						<img  alt="" src="./img/clothes1.jpg">
						<img  alt="" src="./img/clothes2.jpg">
						<img  alt="" src="./img/clothes3.jpg">
						<img  alt="" src="./img/clothes4.jpg">
						<img  alt="" src="./img/clothes5.jpg">
						
					</figure>
					</a>
					<a href="index.html">Clothes </a>
				</div>
				
				</div>				
				
			</div>
		</section>
		
		<footer>
			<p>AuctioX Web Page,Copyright &copy; 2018</p>
			
		
		</footer>
	</body>
</html>