<?php

include 'dbh.php';

$first= $_POST['fname'];
$last= $_POST['lname'];
$email=$_POST['email'];
$uid= $_POST['username'];
$pwd= $_POST['pass'];


$sql= "INSERT INTO site_users (first_name,last_name,email,username,password) VALUES ('$first','$last','$email','$uid','$pwd')";
$result=mysqli_query($conn,$sql);

header("Location:register.html");
