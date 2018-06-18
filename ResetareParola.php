<?php
if(isset($_POST['submit']))
{	include 'db.php';
	$email=$_POST['email'];
	$sql="select * from users where email='$email'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==0)
	{ echo	"Email-ul dat nu exista"."<br>";
	?>
	<a href="LoginParolaUitata.html">Reincearca</a>
	<?php
	}
	else
	{ echo "O noua parola v-a fost trimisa pe email"."<br>";
	$new=rand();
	$row=mysqli_fetch_array($result);
	$nume=$row['username'];
	$msg="Nume cont:$nume \n Parola cont:$new";
	$headers="From: <webmaster@example.com>' ";
	mail("$email","Resetare parola",$msg,$headers);
	?>
	<a href="login.html">Login</a>
	<?php
	}

}
?>