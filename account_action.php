<?php
	session_Start();
	
	include './BackEnd/db.php' ;
	
	//change password
	
	$_SESSION["changed_password"] = "false";
	if(isset($_POST['submit_password']))
	{
		
		$new_password = $_POST['newPassword'];
		$confirm_password = $_POST['confirm_newPassword'];
		
		//if ($new_password != $confirm_newPassword)
		//{
		//	$_SESSION["password_not_same"] = "true";
		//	header('location: accountafterlogin.php');
			
	//	}
	//	else
		//{
		
		$hashedPwd=md5($new_password);
		$stmt = $conn->prepare("UPDATE users set password =? WHERE username =?");
		$stmt->bind_param("ss",$hashedPwd , $username1);
		$username1 = $_SESSION['utilizator'];
		$hashedPwd=md5($new_password);
		$stmt->execute();
		$_SESSION["changed_password"]="true";
		$stmt->close();
		$conn->close();
		header('location: accountafterlogin.php');
		
	//	}

	}
	
?>