<?php

if(isset($_POST['submit']))
	{
	include 'db.php';

	$first=mysqli_real_escape_string($conn,$_POST['fname']);
	$last=mysqli_real_escape_string($conn,$_POST['lname']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$uid=mysqli_real_escape_string($conn,$_POST['username']);
	$pwd=mysqli_real_escape_string($conn,$_POST['pass']);
	$privilegii='0';

	if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$last) )
		{
		header("Location:..//Auctiox/FrontEnd/register.php?=register=invalid");
		exit();
		}
		else
			{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				{
				header("Location:..//Auctiox/FrontEnd/register.php?=register=email");
				exit();
				}
			else
				{
				$verificare="SELECT * FROM site_users WHERE user_id='$uid'";
				$apel=mysqli_query($conn,$verificare);
				$apelCheck=mysqli_num_rows($result);
				
				if($apelCheck >0)
					{
					header("Location:..//Auctiox/FrontEnd/register.php?=register=userulExista");
					exit();	
					}
					else
						{
						$hashedPwd=password_hash($pwd, password_default);
						$sql= "INSERT INTO site_users (first_name,last_name,email,username,password,privilegii) VALUES ('$first','$last','$email','$uid','$pwd','$privilegii')";
						mysqli_query($conn,$sql);
						header("Location:../Auctiox/FrontEnd/register.php?=register=Succes");
						exit();
				}	
			}
		}
	}
else
	{
		header("Location:../register.php");
	}
