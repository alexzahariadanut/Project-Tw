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
						<h1><a href="indexAdmin.php"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li><a href="indexAdmin.php">Home</a></li>
					<li><a href="aboutAdmin.php">About us</a></li>
					<li class="current"><a href="categoriesAdmin.php">Categories</a></li>
					<li><a href="accountAdmin.php">Hello admin <?php session_Start();echo $_SESSION['utilizator']?></a></li>
					<li><a href="logout.php">
					Logout</a></li>
					
				
				
				</ul>
				</nav>
			</div>
		</header>
		
		<section id="newsletter">
			<div class="container">
				<form action="searchAdmin.php">
					<input type="search" name="q" placeholder="Search" required>
					<button type="Submit" class="button_1">Search</button>
				</form>
			
			</div>
		</section>
		
		<section id="main">
			<div class="container">
				<div class="slide-categorii-row1">
				<div class="slider">
					<?php $category_name="Mobile Phones"; ?>
					<a  href="produsAdmin.php?category_name=<?php echo $category_name;?>" ><figure class="mobile">
						<img alt=""  src="./img/telefon1.jpg">
						<img  alt="" src="./img/telefon2.jpg">
						<img  alt="" src="./img/telefon3.jpg">
						<img  alt="" src="./img/telefon4.jpg">
						<img alt="" src="./img/telefon5.jpg">
						
					</figure></a>
					<a href="produsAdmin.php?category_name=<?php echo $category_name; ?>" >Mobile Phones </a>
				</div>
				
				<div class="slider">
					<?php $category_name="Cars"; ?>
					<a  href="produsAdmin.php?category_name=<?php echo $category_name;?>" ><figure class="mobile">
						<img alt="" src="./img/car1.jpg">
						<img alt=""  src="./img/car2.jpg">
						<img  alt="" src="./img/car3.jpg">
						<img  alt="" src="./img/car4.jpg">
						<img  alt="" src="./img/car5.jpg">					
					</figure>
					</a>
					<a href="produsAdmin.php?category_name=<?php echo $category_name;?>">Cars</a>
				</div>
				
					<div class="slider">
					<?php $category_name="Houses"; ?>
					<a  href="produsAdmin.php?category_name=<?php echo $category_name;?>" ><figure class="mobile">
						<img  alt="" src="./img/house1.jpg">
						<img  alt="" src="./img/house2.jpg">
						<img  alt="" src="./img/house3.jpg">
						<img  alt="" src="./img/house4.jpg">
						<img  alt="" src="./img/house5.jpg">
						
					</figure>
					</a>
					<a href="produsAdmin.php?category_name=<?php echo $category_name;?>">Houses </a>
				</div>
				
				</div>
				
				<div class="slide-categorii-row1">
				<div class="slider">
					<?php $category_name="TV"; ?>
					<a  href="produsAdmin.php?category_name=<?php echo $category_name;?>" ><figure class="mobile">
						<img alt=""  src="./img/TV1.jpg">
						<img  alt="" src="./img/TV2.jpg">
						<img  alt="" src="./img/TV3.jpg">
						<img  alt="" src="./img/TV4.jpg">
						<img  alt="" src="./img/TV5.jpg">
						
					</figure>
					</a>
					<a href="produsAdmin.php?category_name=<?php echo $category_name;?>">TV </a>
				</div>
				
				<div class="slider">
					<?php $category_name="PC"; ?>
					<a  href="produsAdmin.php?category_name=<?php echo $category_name;?>" ><figure class="mobile">
						<img  alt="" src="./img/PC1.jpg">
						<img  alt="" src="./img/PC2.jpg">
						<img  alt="" src="./img/PC3.jpg">
						<img  alt="" src="./img/PC4.jpg">
						<img  alt="" src="./img/PC5.jpg">
						
					</figure>
					</a>
					<a href="produsAdmin.php?category_name=<?php echo $category_name;?>">PC </a>
				</div>
				
								<div class="slider">
					<?php $category_name="Clothes"; ?>
					<a  href="produsAdmin.php?category_name=<?php echo $category_name;?>" ><figure class="mobile">
						<img  alt="" src="./img/clothes1.jpg">
						<img  alt="" src="./img/clothes2.jpg">
						<img  alt="" src="./img/clothes3.jpg">
						<img  alt="" src="./img/clothes4.jpg">
						<img  alt="" src="./img/clothes5.jpg">
						
					</figure>
					</a>
					<a href="produsAdmin.php?category_name=<?php echo $category_name;?>">Clothes </a>
				</div>
				
				</div>				
				
			</div>
		</section>
		
		<footer>
			<p>AuctioX Web Page,Copyright &copy; 2018</p>
			
		
		</footer>
	</body>
</html>