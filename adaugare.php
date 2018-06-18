<?php
if(isset($_POST['submit']))
{
	include 'db.php';
	session_start();
	$usernam=$_POST['username'];
	$sql="select * from users where username='$usernam' and privilegii=0";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==0)
	{ echo "Nu s-a gasit in baza de date"."<br>";
	?><a href="AdaugareAdmin.php">Revenire</a>
	<?php
	}
	else
	{
		echo "S-a efectuat cu succes"."<br>";
		$actual="update users set privilegii=1 where username='$usernam'";
		mysqli_query($conn,$actual);
		?><a href="AdaugareAdmin.php">Revenire</a><br>
	<?php
	}
}
?>