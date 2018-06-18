
<?php 

	session_start();

?>



<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width,initial-scale=1.0">

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
				</ul>

			</div>

			



			<div id="formular">

				

				<form name="addItem" action="addItem.php" method="post">

					<h1> Add item </h1>

					

					<p>

						<label for="a">Name:</label>

						<input id="a" type="text"  name="name" required />	

					</p>

					<p>

						<label for="b">Condition:</label>   

						<select id="b"  name="condition" type="text" required />
							<option value="Nou">Nou </option>
							<option value="Folosit">Folosit </option>
						</select>
					</p>

					<p>

						<label for="c">End date: </label>   

						<input  id="c" type="text" name="date" required placeholder="Ex. 2018.06.13 23:59:00 "/>

					</p>

					<p>

						<label for="e">Category:</label>    

						<select id="e" name="category" required >

							<option value="mobile phones">Mobile Phones</option>

							<option value="cars">Cars</option>

							<option value="houses">Houses</option>

							<option value="tv">TV</option>

							<option value="PC">PC</option>

							<option value="clothes">Clothes</option>

						</select>

					</p>

					<p>

						<label for="f"> Starting Price:</label>

						<input  id="f" type="text" name="startingPrice" required min="0" /> 

					</p>

					<p>

						<label for="g"> Pictures: </label>

						<input id="g" type="file" accept="image/*" multiple name="image" required />

					</p>

					<p>

						<label for="h">Description: </label>

						<textarea  id="h" rows="5" cols="40" name="description">

					      

						</textarea>

					</p>

					<input  type ="submit" value="Add item"  name="submit" />

				</form>

			</div>

			



			

			

			

	

	</body>

</html>
