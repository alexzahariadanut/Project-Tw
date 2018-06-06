<?php

if(isset($_POST['submit']))
{
include 'db.php';

$first= $_POST['fname'];
$last= $_POST['lname'];
$email=$_POST['email'];
$uid= $_POST['username'];
$pwd= $_POST['pass'];
$privilegii='0';

$sql= "INSERT INTO site_users (first_name,last_name,email,username,password,privilegii) VALUES ('$first','$last','$email','$uid','$pwd','$privilegii')";
$result=mysqli_query($conn,$sql);

header("Location:../Auctiox/FrontEnd/register.php");
}
else
{
	header("Location:../register.php");
}
