<?php
	session_Start();
	include './BackEnd/db.php' ;
	
	$_SESSION["phone_changed"] = "false";
	if(isset($_POST['submit_phonenr']))
	{
		$username1 = $_SESSION['utilizator'];
		$new_telephone = $_POST['newPhoneNr'];
		$stmt = $conn->prepare("UPDATE users SET telephone='$new_telephone' WHERE username='$username1'");
		$stmt->execute();
		
		$_SESSION["phone_changed"] = "true";
		$stmt->close();
		$conn->close();
		header('location: accountafterlogin.php');
		exit();
	}
	
?>