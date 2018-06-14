<?php
include 'db.php';

$result=mysqli_query($conn,"select * from products join users on users.user_id=products.seller_id join auctions on auctions.product_id=products.product_id");

$xml=new DOMDocument("1.0");
$xml->formatOutput=true;
$licitatii=$xml->createElement("Licitatii");
$xml->appendChild($licitatii);
while($row=mysqli_fetch_array($result))
{
	$Licitatie=$xml->createElement("Licitatie");
	$licitatii->appendChild($Licitatie);
	
	$productname=$xml->createElement("NumeleProdusului",$row['product_name']);
	$Licitatie->appendChild($productname);
	
	$descname=$xml->createElement("DescriereaProdusului",$row['product_description']);
	$Licitatie->appendChild($descname);
	
	$vand=$xml->createElement("Vanzator",$row['username']);
	$Licitatie->appendChild($vand);
	
	$endt=$xml->createElement("DataLimita",$row['end_date']);
	$Licitatie->appendChild($endt);
}
echo"<xmp>".$xml->saveXML()."</xmp>";
$xml->save("licitatii.xml");
?>