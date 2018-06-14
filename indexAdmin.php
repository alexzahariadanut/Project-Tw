<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="description" content="The MDN Web Docs Learning Area aims to provide complete beginners to the Web with all they need to know to get started with developing web sites and applications.">
		<meta name="keywords" content="Web design">
		<meta name="author" content="Alex Zaharia,Sima Paul,Rebegea Bogdan,Iulian Crisnuta">
		<title>AuctioX | Welcome</title>
		<link rel="stylesheet" href="./css/style.css"> 
	</head>
	<body>
		<header>
			<div class="container">
				<div id="branding">
					<h1><a href="indexAdmin.php"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li class="current"><a href="indexAdmin.php">Home</a></li>
					<li><a href="aboutAdmin.php">About us</a></li>
					<li><a href="categoriesAdmin.php">Categories</a></li>
					<li><a href="accountAdmin.php">Hello admin <?php session_Start();echo $_SESSION['utilizator']?></a></li>
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
				<form action="searchAdmin.php">
					<input type="search" name="q" placeholder="Search" required>
					<button type="Submit" class="button_1">Search</button>
				</form>
			
			</div>
		</section>
		
		<section id="boxes">
			<div class="container">
				<div class="box">
					<a href="categories.html">
						<img src="./img/Cars.jpg" alt="">
						<h3>Cars</h3>
						<p>It's frequently said that buying a car at auction is a simple way of saving a lot of money.</p>
					</a>
				</div>
				<div class="box">
					<a href="categories.html">
						<img src="./img/houses.jpg" alt="">
						<h3>Houses</h3>
						<p>Why would anyone be interested in buying a property at auction? For one thing, an auction offers a first chance to snap up a type of property you might not otherwise be able to afford.</p>
				    </a>
				</div>
				<div class="box">
					<a href="categories.html">
						<img src="./img/auto5.jpg" alt="">
						<h3>Objects</h3>
						<p>Many people visit live auctions hoping for a bargain.</p>
					</a>
				</div>
			</div>
		</section>
		
		<section id="newsletter2">
			<div class="container">
				<form>
					<p>What we do?  
					AuctioX is where the world goes to shop, sell, and give.</p>
					
				</form>
			
			</div>
		</section>
		   <a href="about.html" >
			<div class="post">
			<img src="./img/prima.jpg" alt="">
			<div class="post-s">
				<h2>Welcome to our website</h2>
			</div>
			
			</div>
			</a>
			
			<a href="account.html">	
			<div class="post">
			<img src="./img/doi.jpg" alt="">
			<div class="post-s">
				<h2>We hope you find something</h2>
			</div>
			
			</div>
			</a
			>
		<section id="newsletter3">
			<div class="container">
				<form>
					
				</form>
			
			</div>
		</section>
		<footer>
			<article>AuctioX Web Page,Copyright &copy; 2018</article>
		</footer>
	</body>
</html>