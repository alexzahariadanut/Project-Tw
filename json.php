<?php
include 'db.php';
$result=mysqli_query($conn,"select * from products");
$json_array=array();
while($row=mysqli_fetch_assoc($result))
{
	$json_array[]=array(
	'id_produsului' =>$row['product_id'],
	'Numele produsului' =>$row['product_name'],
	'Descriera produsului' =>$row['product_description'],
	'Numarul categoriei' =>$row['category_id'],
	);
}

echo '<pre>';
print_r($json_array);
echo '</pre>';
?>