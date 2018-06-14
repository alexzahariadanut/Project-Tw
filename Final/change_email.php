<?php
	session_Start();
	include './BackEnd/db.php' ;
	
	$_SESSION["email_changed"] = "false";
	if(isset($_POST['submit_email']))
	{
		$username1 = $_SESSION['utilizator'];
		$new_email = $_POST['newEmail'];
		$stmt = $conn->prepare("UPDATE users SET email='$new_email' WHERE username='$username1'");
		//$stmt->bind_param("ss", $new_email, $username1);
		//$new_email = $_POST['newEmail']; 
		
		$stmt->execute();
		
		$_SESSION["email_changed"] = "true";
		$stmt->close();
		$conn->close();
		header('location: accountafterlogin.php');
		exit();
	}
	
?>