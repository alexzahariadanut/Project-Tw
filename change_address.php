<?php
	session_Start();
	include './BackEnd/db.php' ;
	
	$_SESSION["address_changed"] = "false";
	if(isset($_POST['submit_address']))
	{
		$username1 = $_SESSION['utilizator'];
		
		$new_street = $_POST['newStreet'];
		$new_country = $_POST['newCountry'];
		$new_city = $_POST['newCity'];
		$new_zipcode = $_POST['newZipCode'];
		$stmt = $conn->prepare("UPDATE users SET street='$new_street',zip_code='$new_zipcode', city= '$new_city', country='$new_country' WHERE username='$username1'");
		$stmt->execute();
		
		$_SESSION["address_changed"] = "true";
		$stmt->close();
		$conn->close();
		header('location: accountafterlogin.php');
		exit();
	}
	
?>