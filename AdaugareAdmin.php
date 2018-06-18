<?php session_start();?>
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
					<h1><a href="indexAdmin.php"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li><a href="indexAdmin.php">Home</a></li>
					<li><a href="aboutAdmin.php">About us</a></li>
					<li><a href="categoriesAdmin.php">Categories</a></li>
					<li class="current"><a href="accountAdmin.php">Hello admin <?php echo $_SESSION['utilizator']?></a></li>
					<li><a href="logout.php">
					Logout</a></li>
				
				
				</ul>
				</nav>
			</div>
		</header>
		</header>
			<div id="sidebar">
				
				<ul>
					<li><a href="VizualizareUseri.php"> <img id="side-pics1" src="./img/avatar.png" alt="Account Icon">Vizualiare Useri</a></li>
					<li><a href="VizualizareLicitatii.php"> <img id="side-pics1" src="./img/myaccount.jpg" alt="Account Icon">Vizualizare Licitatii</a></li>
					<li><a href="AdaugareAdmin.php"> <img id="side-pics1" src="./img/admin.png" alt="Account Icon">Adaugare Admin</a></li>
				</ul>
			</div>
			<div id="utilizator">
				<form action="adaugare.php" method="post">
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter Username" required>
				<input type="Submit" name="submit" value="Adaugare">
				</form>
			</div>
	</body>
</html>
