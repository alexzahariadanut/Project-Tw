<?php 
	include 'db_connection.php'; 
	$conn = OpenCon();

	session_start();
	$username=$_SESSION['utilizator'];

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
					<h1><a href="indexafterlogin.php"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li><a href="indexafterlogin.php">Home</a></li>
					<li><a href="aboutafterlogin.php">About us</a></li>
					<li><a href="categoriesafterlogin.php">Categories</a></li>
					<li class="current"><a href="accountafterlogin.php">My Account(<?php echo $_SESSION['utilizator']?>)</a></li>
					<li><a href="logout.php">
					Logout</a></li>
				
				
				</ul>
				</nav>
			</div>
		</header>
		
			<div id="sidebar">
				
				<ul>
					<li><a href="accountafterlogin.php"> <img id="side-pics1" src="./img/myaccount.jpg" alt="Account Icon"> Account details</a></li>
					<li><a href="purchase_history.php"> <img id="side-pics2" src="./img/history.jpg" alt="Purchase History Icon"> Purchase history</a></li>
					<li><a href="inventory.php"> <img id="side-pics3" src="./img/inventory.jpg" alt="Inventory Icon"> Inventory</a></li>
					<li><a href="FormatAtom.php"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> Stiri In Format Atom</a></li>
					<li><a href="licitatii.xml"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> XML generare</a></li>
					<li><a href="json.php"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> JSON generare</a></li>
					<li><a href="pdf.php"> <img id="side-pics4" src="./img/payment.jpg" alt="Payment Icon"> PDF generare</a></li>
				
				</ul>
			</div>
			
			
<div id="utilizator">
				<?php include'db.php';
				$username=$_SESSION['utilizator'];
				$sql="select * from users join transactions on users.user_id=transactions.buyer_id where username='$username'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
				?>
				<h1>Obiecte cumparate</h1>
				<table>
				<tr>
					<th>Nume vanzator</th>
					<th>Nume cumparator</th>
					<th>Nume produs</th>
					<th>Pret</th>
					<th>Adresa Livrare</th>
					<th>Metoda plata</th>
				</tr>
				
				<?php
				while($row=mysqli_fetch_array($result))
				{?>
				<tr>
				<?php
				$vanzator=$row['seller_id'];
				$sqql="select * from users where user_id='$vanzator'";
				$rest=mysqli_query($conn,$sqql);
				$ver=mysqli_fetch_array($rest);
				?>
					<td><?php echo $ver['first_name']." ".$ver['last_name']?></td>
				<?php
				$produs=$row['auction_id'];
				$pp="select * from auctions a join products p on p.product_id=a.product_id where a.auction_id='$produs'";
				$return=mysqli_query($conn,$pp);
				$loop=mysqli_fetch_array($return);
				$ada="select * from users where username='$username'";
				$ret=mysqli_query($conn,$ada);
				$nu=mysqli_fetch_array($ret);
				?>
				
					<td><?php echo $nu['first_name']." ".$nu['last_name']?></td>
					<td><?php echo $loop['product_name']?></td>
					
					<td><?php echo $row['amount_of_money']?></td>
				<?php
				$sqlfinal="select * from users where username='$username'";
				$afiseaza=mysqli_query($conn,$sqlfinal);
				$sima=mysqli_fetch_array($afiseaza);
				?>
					<td><?php echo $sima['street']." ".$sima['zip_code']." ".$sima['country']." ".$sima['city']?></td>
					<td><?php echo "Ramburs"?></td>
				</tr>
				<?php 
				}
				}
				else
				{	?>
					<h1>Obiecte cumparate</h1>
					<?php
					echo "Nu sunt obiecte cumparate";
				}
				
				?>
				</table>
				
				
				
			</div>
			
<div id="utilizator">
				<?php include'db.php';
				$username=$_SESSION['utilizator'];
				$sql="select * from users join transactions on users.user_id=transactions.seller_id where username='$username'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{
				?>
				<h1>Obiecte vandute</h1>
				<table>
				<tr>
					<th>Nume vanzator</th>
					<th>Nume cumparator</th>
					<th>Nume produs</th>
					<th>Pret</th>
					<th>Adresa Livrare</th>
					<th>Metoda plata</th>
				</tr>
				
				<?php
				while($row=mysqli_fetch_array($result))
				{?>
				<tr>
				<?php
				$vanzator=$row['buyer_id'];
				$sqql="select * from users where user_id='$vanzator'";
				$rest=mysqli_query($conn,$sqql);
				$ver=mysqli_fetch_array($rest);
				$produs=$row['auction_id'];
				$pp="select * from auctions a join products p on p.product_id=a.product_id where a.auction_id='$produs'";
				$return=mysqli_query($conn,$pp);
				$loop=mysqli_fetch_array($return);
				$ada="select * from users where username='$username'";
				$ret=mysqli_query($conn,$ada);
				$nu=mysqli_fetch_array($ret);
				$sqlfinal="select * from users where user_id='$vanzator'";
				$afiseaza=mysqli_query($conn,$sqlfinal);
				$sima=mysqli_fetch_array($afiseaza);
				?>
				
					<td><?php echo $nu['first_name']." ".$nu['last_name']?></td>
					<td><?php echo $ver['first_name']." ".$ver['last_name']?></td>
					<td><?php echo $loop['product_name']?></td>
					
					<td><?php echo $row['amount_of_money']?></td>
				
					<td><?php echo $sima['street']." ".$sima['zip_code']." ".$sima['country']." ".$sima['city']?></td>
					<td><?php echo "Ramburs"?></td>
				</tr>
				<?php 
				}
				}
				else
				{	?>
					<h1>Obiecte vandute</h1>
					<?php
					echo "Nu sunt obiecte vandute";
				}
				?>
				</table>
				
				
				
			</div>			
	</body>
</html>
