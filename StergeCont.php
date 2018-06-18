<?php
include 'db.php';
$user_id=$_GET['userID'];
$sql="delete from bids where bidder_id='$user_id'";
$result=mysqli_query($conn,$sql);
$sql="select auction_id from auctions where seller_id='$user_id'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
if($row['auction_id']>0)
{$parametru=$row['auction_id'];
{$std="delete from bids where auction_id='$parametru'";
mysqli_query($conn,$std);
$sql_t="delete from auctions where auction_id='$parametru'";
mysqli_query($conn,$sql_t);
$sql_ver="delete from transactions where auction_id='$parametru'";
mysqli_query($conn,$sql_ver);
}
}
$sql_v="delete from transactions where seller_id='$user_id' or buyer_id='$user_id'";
mysqli_query($conn,$sql_v);
$sql_delete="delete from products where seller_id='$user_id'";
mysqli_query($conn,$sql_delete);
$sql="DELETE FROM users where user_id='$user_id'";
IF(mysqli_query($conn,$sql))
{session_start();?>
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
					<li><a href="VizualizareUseri.php"> <img id="side-pics1" src="./img/myaccount.jpg" alt="Account Icon">Vizualizare Useri</a></li>
					<li><a href="VizualizareLicitatii.php"> <img id="side-pics1" src="./img/myaccount.jpg" alt="Account Icon">Vizualizare Licitatii</a></li>
					<li><a href="AdaugareAdmin.php"> <img id="side-pics1" src="./img/admin.png" alt="Account Icon">Adaugare Admin</a></li>
				</ul>
			</div>
			<div id="utilizator">
				<?php include'db.php';
				$user=$_SESSION['utilizator'];
				$sql="select * from users where username<>'$user'";
				$result=mysqli_query($conn,$sql);
					echo "Utilizatorul s-a sters cu succes"."<br>";
				if(mysqli_num_rows($result)==0)
					echo "Nu s-a gasit nici un utilizator in baza de date de afisat";
				else
				{
				?>
				<table>
				<tr>
					<th>Nume cont</th>
					<th>Nume utilizator</th>
					<th>Prenume utilizator</th>
					<th>Actiune</th>
				</tr>
				
				<?php
				while($row=mysqli_fetch_array($result))
				{?>
				<tr>
					<td><?php echo $row['username']?></td>
					<td><?php echo $row['first_name']?></td>
					<td><?php echo $row['last_name']?></td>
					<td><a href="StergeCont.php?userID=<?php echo$row['user_id']?>">Stergere cont</a></td>
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
				$user=$_SESSION['utilizator'];
				$sql="select * from users where username<>'$user'";
				$result=mysqli_query($conn,$sql);
					echo "Utilizatorul nu s-a putut sterge"."<br>";
					if(mysqli_num_rows($result)==0)
					echo "Nu s-a gasit nici un utilizator in baza de date de afisat";
				else
				{
				?>
				<table>
				<tr>
					<th>Nume cont</th>
					<th>Nume utilizator</th>
					<th>Prenume utilizator</th>
					<th>Actiune</th>
				</tr>
				
				<?php
				while($row=mysqli_fetch_array($result))
				{?>
				<tr>
					<td><?php echo $row['username']?></td>
					<td><?php echo $row['first_name']?></td>
					<td><?php echo $row['last_name']?></td>
					<td><a href="StergeCont.php?userID=<?php echo$row['user_id']?>">Stergere cont</a></td>
				</tr>
				<?php }
				}?>
				</table>
			</div>
	</body>
</html>
<?php	}
?>
