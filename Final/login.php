<?php
if(isset($_POST['submit_login']))
{	session_Start();
	include 'db.php';
	$usernam=$_POST['username'];
	$password1=$_POST['parola'];
	$hashedPwd=md5($password1);
	$query = "SELECT privilegii FROM users WHERE username='$usernam' AND password='$hashedPwd'";
  	$results = mysqli_query($conn, $query)  or die ( "Error : ". mysql_error() );
  	if (mysqli_num_rows($results) == 1) {
	  if(isset($_POST['remember']))
	  {  
			setcookie('username',$usernam,time()+60*60*7);
			setcookie('password',$password1,time()+60*60*7);
	  }
  	  $_SESSION['utilizator'] = $usernam;
  	  $_SESSION['success'] = "You are now logged in";
	  while ($row = $results->fetch_assoc()) {
		if($row['privilegii']==0)
			header("location: indexafterlogin.php");
		else
			header("location:indexAdmin.php");
	  }

  	}
	else
	{
	?>
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
					<h1><a href="index.php"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.html">About us</a></li>
					<li><a href="categories.html">Categories</a></li>
					<li><a href="login.html">Login</a></li>
					<li><a href="register.html">Register</a></li>
					<li><a href="account.html">My Account</a></li>
				
				
				</ul>
				</nav>
			</div>
		</header>
		
		<section id="newsletter">
			<div class="container">
				<form action="search.php">
					<input type="search" name="q" placeholder="Search" required>
					<button type="Submit" class="button_1">Search</button>
				</form>
			
			</div>
		</section>
	<h3>Ati introdus gresit numele sau parola</h3>	
	<a href="login.html">Reincearca</a>
	<footer>
			<p>AuctioX Web Page,Copyright &copy; 2018</p>
		</footer>
	</body>
</html>
	<?php
	}
}
?>