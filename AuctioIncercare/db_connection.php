<?php
 
function OpenCon()
 {
 $dbhost = "127.0.0.1";
 $dbuser = "root";
 $password = "";
 $db = "dbhphpsearch";
 
 
 $conn = new mysqli($dbhost,$dbuser,$password,$db) or die("Connect failed: %s\n". $conn -> error);
 
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>