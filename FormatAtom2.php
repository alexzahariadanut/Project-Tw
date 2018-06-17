<?php
$db = new mysqli('localhost','root','','auctiox');
$query = $db->query("Select * from products join auctions on products.product_id=auctions.product_id " );
if($db->affected_rows >=1) {
	echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<feed xmlns="http://www.w3.org/2005/Atom">
 <?php
	while($row = $query->fetch_assoc()) {
  ?>
  <title>Atom Feed For Objects</title> 
  <link href="http://localhost/Proiect/Nou/Project-Tw-master/index.php"/>
  <updated><?php echo  $row['start_date'];?></updated>
  <author> 
    <name>Echipa Tw</name>
  </author> 
  

  
  <entry>
    <title><?php echo $row['product_name'];?></title>
    <link href="http://localhost/Proiect/Nou/Project-Tw-master/searchfeed.php"/>

    <updated><?php echo $row['end_date'];?></updated>
    <summary><?php echo $row['product_description'];?></summary>
  </entry>
  <?php
	}
  ?>


</feed>
<?php
}
?>
