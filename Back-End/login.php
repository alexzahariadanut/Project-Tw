<?php
if(isset($_POST['submit']))
{	
    session_Start();
	include 'db.php';
	$usernam=$_POST['username'];
	$password=$_POST['pass'];
	$hasPwd=password_hash($password,PASSWORD_BCRYPT);
	$query = "SELECT * FROM users WHERE username='$usernam' AND password='123'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $usernam;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: indexafterlogin.html');
  	}
}
?>
	