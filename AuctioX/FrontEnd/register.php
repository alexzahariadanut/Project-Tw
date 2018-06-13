<?php
$errors = array();
if(isset($_POST['submit']))
	{
	include 'db.php';
	session_Start();
	$uid=$_POST['username'];
	$pwd=$_POST['pass'];
	$pwd2=$_POST['pass2'];
	$first=$_POST['fname'];
	$last=$_POST['lname'];
	$street=$_POST['street'];
	$zip=$_POST['zip'];
	$city=$_POST['city'];
	$country=$_POST['country'];
	$email=$_POST['email'];
	$telefon=$_POST['telefon'];
	$privilegii='0';
	
	$user_check_query = "SELECT * FROM users WHERE username='$uid' OR email='$email' LIMIT 1";
	$result = mysqli_query($conn, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	
	if(preg_replace("/[a-zA-Z0-9]/", "", $uid)){
		array_push($errors, "Username-ul este incorect<br>");
	}
	if(preg_replace("/[a-zA-Z0-9]/", "", $pwd)||preg_replace("/[a-zA-Z0-9]/", "", $pwd2)){
		array_push($errors, "Parola incorecta<br>");
	}
	if(strlen($pwd)<6){
		array_push($errors, "Parola trebuie sa contina minim 6 caractere<br>");
	}
	if(strcmp($pwd,$pwd2)!=0){
		array_push($errors, "Cele doua parole nu corespund<br>");
	}
	if(preg_replace("/[a-zA-Z -]/", "", $first)){
		array_push($errors, "Nu puteti folosi alte caractere in afara de litere in nume<br>");
	}
	if(preg_replace("/[a-zA-Z -]/", "", $last)){
		array_push($errors, "Nu puteti folosi alte caractere in afara de litere in prenume<br>");
	}
	if(preg_replace("/[0-9]/", "", $zip)){
		array_push($errors, "Codul postal este incorcet<br>");
	}
	if(preg_replace("/[a-zA-Z -]/", "", $city)){
		array_push($errors, "Orasul introdus este incorect<br>");
	}
	if(preg_replace("/[a-zA-Z -]/", "", $country)){
		array_push($errors, "Tara introdus este incorecta<br>");
	}
	if(preg_replace("/[0-9]/", "", $telefon)){
		array_push($errors, "Numarul de telefon este incorect<br>");
	}
	if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username-ul exista deja<br>");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email-ul exista deja<br>");
    }
    }
	
	if (count($errors) == 0) {
  	$hashedPwd=md5($pwd);

  	$query = "INSERT INTO users (username,password,first_name,last_name,street,zip_code,city,country,email,telephone,privilegii) 
  			  VALUES('$uid', '$hashedPwd', '$first', '$last', '$street', '$zip', '$city', '$country', '$email', '$telefon','$privilegii')";
  	mysqli_query($conn, $query);
  	$_SESSION['utilizator'] = $uid;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: indexafterlogin.php');
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
					<h1><a href="index.html"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
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
				<form>
					<input type="search" name="q" placeholder="What are you looking for?">
					<button type="Submit" class="button_1">Search</button>
				</form>
			
			</div>
		</section>
	<?php
	foreach($errors as $error)
		{echo $error;
		}
	echo '<a href="register.html" style="FONT-SIZE:160%">Reintrodu datele<a><br>';
		
	}
	
	
	}?>
	<footer>
			<p>AuctioX Web Page,Copyright &copy; 2018</p>
		</footer>
	</body>
</html>
	
