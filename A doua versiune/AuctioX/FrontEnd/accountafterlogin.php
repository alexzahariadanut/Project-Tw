<?php
		session_Start();
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
					<li><a href="payment.php"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> Payment</a></li>
					<li><a href="FormatAtomHtml.html"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> Stiri In Format Atom</a></li>
					<li><a href="AtomFormat.xml"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> XML generare</a></li>
				</ul>
			</div>
			
			<div id="formular">
					<h1>Change your username</h1>
					
					<form name="changeUsername" action="changeUsername.php" method="post">

					

					<p>

						<label for="a">Enter new username:</label>

						<input id="a" type="text"  name="newUsername"  />	

					</p>
					
					
					<input  type ="submit" value="Change Username"  name="submit_username" />
					
			
			</div>
	<script>		
	function myFunction() {
    var x = document.getElementById("b");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
			<div id="formular">
					<h1>Change your password</h1>
					
					<form name="changePassword" action="changePassword.php" method="post">

					

					<p>

						<label for="a">Enter new password:</label>

						<input id="a" type="password"  name="newPassword"  />	

					</p>
					
					<p>

						<label for="b">Confirm new password:</label>

						<input id="b" type="password"  name="confirm_newPassword"  />	

					</p>
					<p> <input type="checkbox" onclick="myFunction()">Show Password </p>
					<input  type ="submit" value="Change Password"  name="submit_password"  />
					
			
			</div>
			<div id="formular">
					<h1>Change your e-mail</h1>
					
					<form name="changeEmail" action="changeEmail.php" method="post">

					<p>Your e-mail is :  <?php include './BackEnd/db.php' ;
											$user = $_SESSION['utilizator'];
									
											$sql = "SELECT email from users WHERE username = '$user'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_assoc($result);
											echo $row['email']; ?>  </p>

					<p>

						<label for="a">Enter new e-mail:</label>

						<input id="a" type="e-mail"  name="newEmail"  />	

					</p>
					
					
					<input  type ="submit" value="Change Email"  name="submit_email" />
					
			
			</div>
			<div id="formular">
					<h1>Change your phone number</h1>
					
					<form name="changePhoneNr" action="changePhoneNr.php" method="post">

					<p>Your phone number is :  <?php include './BackEnd/db.php' ;
											$user = $_SESSION['utilizator'];
									
											$sql = "SELECT telephone from users WHERE username = '$user'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_assoc($result);
											echo $row['telephone']; ?>  </p>

					<p>

						<label for="a">Enter new phone number:</label>

						<input id="a" type="number"  name="newEmail"  />	

					</p>
					
					
					<input  type ="submit" value="Change Phone Number"  name="submit_phonenr" />
					
			</div>
			<div id="formular">
					<h1>Change your address</h1>
					
					<form name="changeAddress" action="changeAddress.php" method="post">

					<p>Your street is :  <?php include './BackEnd/db.php' ;
											$user = $_SESSION['utilizator'];
									
											$sql = "SELECT street from users WHERE username = '$user'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_assoc($result);
											echo $row['street']; ?>  
					</p>
					<p>Your country is :  <?php include './BackEnd/db.php' ;
											$user = $_SESSION['utilizator'];
									
											$sql = "SELECT country from users WHERE username = '$user'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_assoc($result);
											echo $row['country']; ?>  
					</p>
					<p>Your city is :  <?php include './BackEnd/db.php' ;
											$user = $_SESSION['utilizator'];
									
											$sql = "SELECT city from users WHERE username = '$user'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_assoc($result);
											echo $row['city']; ?>  
					</p>
					<p>Your zip code is :  <?php include './BackEnd/db.php' ;
											$user = $_SESSION['utilizator'];
									
											$sql = "SELECT zip_code from users WHERE username = '$user'";
											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_assoc($result);
											echo $row['zip_code']; ?>  
					</p>

					<p>

						<label for="a">Enter new street:</label>

						<input id="a" type="text"  name="newStreet"  />	

					</p>
					<p>

						<label for="b">Enter new country:</label>

						<input id="b" type="text"  name="newCountry"  />	

					</p>
					<p>

						<label for="c">Enter new city:</label>

						<input id="c" type="text"  name="newCity"  />	

					</p>
					<p>

						<label for="d">Enter new zip code:</label>

						<input id="d" type="text"  name="newZipCode"  />	

					</p>
					
					<input  type ="submit" value="Change Adress"  name="submit_address" />
					
			
			</div>
	</body>
</html>
