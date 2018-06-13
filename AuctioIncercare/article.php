<?php	
	include 'header.php';
?>

<h1>Article page</h1>
<div class= " article-container">
	<?php
		$sql="Select * FROM article";
		$result = mysqli_query($conn,$sql);
		$queryResults= mysqli_num_rows($result);
		
		if($queryResults>0)
		{
			while($row= mysqli_fetch_assoc($result))
			{
				echo "<div>
							<h3>".$row['product_name']."</h3>
						<p>".$row['product_description']."</p>
						<p>".$row['seller_id']."</p>
						<p>".$row['category_id']."</p>
					</div>";
			}
			
		}
		
	
	
	
	?>
</div>

	
</body>
</html>