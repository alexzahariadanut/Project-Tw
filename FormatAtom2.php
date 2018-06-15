<?php
$db = new mysqli('localhost','root','','auctiox');
$query = $db->query("Select * from products join auctions on products.seller_id=auctions.seller_id " );
if($db->affected_rows >=1) {
	echo '<?xml version="1.0" encoding="utf-8"?>' ?>
<feed xmlns="http://www.w3.org/2005/Atom">
 <?php
	while($row = $query->fetch_assoc()) {
  ?>
  <title>Atom Feed For Objects</title> 
  <link href="http://example.org/"/>
  <updated><?php echo  $row['start_date'];?></updated>
  <author> 
    <name>Alex Zaharia</name>
  </author> 
  <id><?php echo $row['category_id']; ?></id>

  
  <entry>
    <title><?php echo $row['product_name'];?></title>
    <link href="http://example.org/2003/12/13/atom03"/>
     <id><?php echo $row['category_id']; ?></id>
    <updated><?php echo $row['start_date'];?></updated>
    <summary><?php echo $row['product_description'];?></summary>
  </entry>
  <?php
	}
  ?>


</feed>
<?php
}
?>