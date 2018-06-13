<?php session_Start()?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="description" content="The MDN Web Docs Learning Area aims to provide complete beginners to the Web with all they need to know to get started with developing web sites and applications.">
		<meta name="keywords" content="Web design">
		<meta name="author" content="Alex Zaharia,Sima Paul,Rebegea Bogdan,Iulian Crisnuta">
		<title>AuctioX | About us</title>
		<link rel="stylesheet" href="./css/style.css"> 
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
					<li class="current"><a href="aboutafterlogin.php">About us</a></li>
					<li><a href="categoriesafterlogin.php">Categories</a></li>
					<li><a href="accountafterlogin.php">My Account(<?php echo $_SESSION['utilizator']?>)</a></li>
					<li><a href="logout.php">
					Logout</a></li>
				
				
				</ul>
				</nav>
			</div>
		</header>
		
		<section id="newsletter">
			<div class="container">
				<form action="search.php">
					<input type="search" name="q" placeholder="What are you looking for?">
					<button type="Submit" class="button_1">Search</button>
				</form>
			
			</div>
		</section>
		
		<section id="main">
			<div class="container">
				<aside id="sidebar">
					<div class="dark">
					<h3>What we do?</h3>
				<p>	Whether you are buying new or used, plain or luxurious, commonplace or rare, trendy or one-of-a-kind – if it exists in the world, it probably is for sale on AuctioX. Our mission is to be the world’s favorite destination for discovering great value and unique selection.

					We give sellers the platform, solutions, and support they need to grow their businesses and thrive. We measure our success by our customers' success.
				</p>
				</div>
				</aside>
				
				<aside id="side">
					<div class="dark">
						<h3>	What sets us apart
								Our vision for commerce is one that is enabled by people, powered by technology, and open to everyone.
						</h3>
						<p>		We empower people and create economic opportunity.

							We focus on partnering with our sellers, not competing with them. We are building stronger connections between buyers and sellers with product experiences that are fast, mobile, and secure. And we are transforming the individual selling experience to help you turn the things you no longer need into cash you can use.
						</p>
					</div>
				</aside>
				
				
				<aside id="sidebars">
					<div class="dark">
					<h3>Partner to Sellers</h3>
				<p>For more than two decades, AuctioX has played a central role in creating an inclusive and accessible commerce platform that enables anyone to participate in the global economy.
				</p>
				</div>
				</aside>
				
			</div>
		</section>
		
		<footer>
			<p>AuctioX Web Page,Copyright &copy; 2018</p>
		</footer>
	</body>
</html>