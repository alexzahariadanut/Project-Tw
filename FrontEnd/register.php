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
	
	if(preg_replace("/[a-zA-Z -]/", "", $uid)){
		array_push($errors, "Username este incorect<br>");
	}
	if(preg_replace("/[a-zA-Z0-9]/", "", $pwd)||preg_replace("/[a-zA-Z0-9]/", "", $pwd2)){
		array_push($errors, "Parola incorecta<br>");
	}
	if(strlen($pwd)<6){
		array_push($errors, "Parola trebuie sa contina minim 6 caractere<br>");
	}
	if(strcmp($pwd,$pwd2)!=0){
		array_push($errors, "Cele 2 parole nu corespund<br>");
	}
	if(preg_replace("/[a-zA-Z -]/", "", $first)){
		array_push($errors, "Nu poti folosi alte caractere in afara de litere in nume<br>");
	}
	if(preg_replace("/[a-zA-Z -]/", "", $last)){
		array_push($errors, "Nu poti folosi alte caractere in afara de litere in prenume<br>");
	}
	if(preg_replace("/[0-9]/", "", $zip)){
		array_push($errors, "Username este incorect<br>");
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
      array_push($errors, "Username exista deja<br>");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email exista deja<br>");
    }
    }
	
	if (count($errors) == 0) {
  	$hashedPwd=password_hash($pwd, PASSWORD_BCRYPT);

  	$query = "INSERT INTO users (username,password,first_name,last_name,street,zip_code,city,country,email,telephone,privilegii) 
  			  VALUES('$uid', '$hashedpwd', '$first', '$last', '$street', '$zip', '$city', '$country', '$email', '$telefon','$privilegii')";
  	mysqli_query($conn, $query);
  	$_SESSION['username'] = $uid;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: indexafterlogin.html');
    }
	else
	{foreach($errors as $error)
		{echo $error;
		}
	echo '<a href="register.html" style="FONT-SIZE:160%">Reintrodu datele<a><br>';
	echo '<a href="index.html" style="FONT-SIZE:160%">HOME<a>';
		
	}
	
	
	}
	
?>