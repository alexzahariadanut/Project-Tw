<?php
include 'db_connection.php';
 
$conn = OpenCon();

$sql="select * from products where product_id =".$_GET["iid"];
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
{ 
	  echo '<p>'.$row['product_name'].'</p>' ;
	 $imageData = $row['image'];
	 echo $imageData;

}

 CloseCon($conn)
?>