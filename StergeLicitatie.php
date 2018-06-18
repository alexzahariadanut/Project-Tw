<?php
include 'db.php';
$products_id=$_GET['productID'];
$sql="select auction_id from auctions where product_id='$products_id'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
if($row['auction_id']>0)
{$parametru=$row['auction_id'];
$sql_bid="delete from bids where auction_id='$parametru'";
mysqli_query($conn,$sql_bid);
$sql_trans="delete from transactions where auction_id='$parametru'";
mysqli_query($conn,$sql_trans);
$sql_auct="delete from auctions where auction_id='$parametru'";
mysqli_query($conn,$sql_auct);
}
$sql="DELETE FROM products where product_id='$products_id'";
IF(mysqli_query($conn,$sql))
{session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="keywords" content="Web design">
		<meta name="author" content="Alex Zaharia,Sima Paul,Rebegea Bogdan,Iulian Crisnuta">
		<title>AuctioX | My Account</title>
		<link rel="stylesheet" href="./css/style2.css"> 
		<link rel="stylesheet" href="./css/inventory.css">
	</head>
	<body>
		<header>
			<div class="container">
				<div id="branding">
					<h1><a href="indexAdmin.php"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li><a href="indexAdmin.php">Home</a></li>
					<li><a href="aboutAdmin.php">About us</a></li>
					<li><a href="categoriesAdmin.php">Categories</a></li>
					<li class="current"><a href="accountAdmin.php">Hello admin <?php echo $_SESSION['utilizator']?></a></li>
					<li><a href="logout.php">
					Logout</a></li>
				
				
				</ul>
				</nav>
			</div>
		</header>
		</header>
			<div id="sidebar">
				
				<ul>
					<li><a href="VizualizareUseri.php"> <img id="side-pics1" src="./img/avatar.png" alt="Account Icon">Vizualizare Useri</a></li>
					<li><a href="VizualizareLicitatii.php"> <img id="side-pics1" src="./img/myaccount.jpg" alt="Account Icon">Vizualizare Licitatii</a></li>
					<li><a href="AdaugareAdmin.php"> <img id="side-pics1" src="./img/admin.png" alt="Account Icon">Adaugare Admin</a></li>
				</ul>
			</div>
			<div id="utilizator">
				<?php include'db.php';
				$sql="select p.product_id,p.product_name,p.product_description,p.image,u.username from products p join users u on p.seller_id=u.user_id";
				$result=mysqli_query($conn,$sql);
				echo "Licitatia s-a sters cu succes"."<br>";
				if(mysqli_num_rows($result)==0)
					echo "Nu s-a gasit nici o licitatie in baza de date de afisat";
				else
				{
				?>
				<table>
				<tr>
					<th>Nume Licitatie</th>
					<th>Descriere licitatie</th>
					<th>Nume vanzator</th>
					<th>Imagine produs</th>
					<th>Actiune</th>
				</tr>
				
				<?php
				while($row=mysqli_fetch_array($result))
				{?>
				<tr>
					<td><?php echo $row['product_name']?></td>
					<td><?php echo $row['product_description']?></td>
					<td><?php echo $row['username']?></td>
					<td><?php echo '<img alt="" id="imagine-produs" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'?></td>
					<td><a href="StergeLicitatie.php?productID=<?php echo$row['product_id']?>">Stergere Licitatie</a></td>
				</tr>
				<?php }
				}?>
				</table>
			</div>
	</body>
</html>
<?php
}
	else
	{session_start();?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="keywords" content="Web design">
		<meta name="author" content="Alex Zaharia,Sima Paul,Rebegea Bogdan,Iulian Crisnuta">
		<title>AuctioX | My Account</title>
		<link rel="stylesheet" href="./css/style2.css"> 
		<link rel="stylesheet" href="./css/inventory.css">
	</head>
	<body>
		<header>
			<div class="container">
				<div id="branding">
					<h1><a href="indexAdmin.php"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li><a href="indexAdmin.php">Home</a></li>
					<li><a href="aboutAdmin.php">About us</a></li>
					<li><a href="categoriesAdmin.php">Categories</a></li>
					<li class="current"><a href="accountAdmin.php">Hello admin <?php echo $_SESSION['utilizator']?></a></li>
					<li><a href="logout.php">
					Logout</a></li>
				
				
				</ul>
				</nav>
			</div>
		</header>
		</header>
			<div id="sidebar">
				
				<ul>
					<li><a href="VizualizareUseri.php"> <img id="side-pics1" src="./img/avatar.png" alt="Account Icon">Vizualizare Useri</a></li>
					<li><a href="VizualizareLicitatii.php"> <img id="side-pics1" src="./img/myaccount.jpg" alt="Account Icon">Vizualizare Licitatii</a></li>
					<li><a href="AdaugareAdmin.php"> <img id="side-pics1" src="./img/admin.png" alt="Account Icon">Adaugare Admin</a></li>
				</ul>
			</div>
			<div id="utilizator">
				<?php include'db.php';
				$sql="select p.product_id,p.product_name,p.product_description,p.image,u.username from products p join users u on p.seller_id=u.user_id";
				$result=mysqli_query($conn,$sql);
				echo "Licitatia nu s-a putut sterge"."<br>";
				if(mysqli_num_rows($result)==0)
					echo "Nu s-a gasit nici o licitatie in baza de date de afisat";
				else
				{
				?>
				<table>
				<tr>
					<th>Nume Licitatie</th>
					<th>Descriere licitatie</th>
					<th>Nume vanzator</th>
					<th>Imagine produs</th>
					<th>Actiune</th>
				</tr>
				
				<?php
				while($row=mysqli_fetch_array($result))
				{?>
				<tr>
					<td><?php echo $row['product_name']?></td>
					<td><?php echo $row['product_description']?></td>
					<td><?php echo $row['username']?></td>
					<td><?php echo '<img alt="" id="imagine-produs" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'?></td>
					<td><a href="StergeLicitatie.php?productID=<?php echo$row['product_id']?>">Stergere Licitatie</a></td>
				</tr>
				<?php }
				}?>
				</table>
			</div>
	</body>
</html>
<?php	}
?>