<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="description" content="The MDN Web Docs Learning Area aims to provide complete beginners to the Web with all they need to know to get started with developing web sites and applications.">
		<meta name="keywords" content="Web design">
		<meta name="author" content="Alex Zaharia,Sima Paul,Rebegea Bogdan,Iulian Crisnuta">
		<title>AuctioX | Welcome</title>
		<link rel="stylesheet" href="./css/alex2.css">  
	</head>
	<body>
		<header>
			<div class="container">
				<div id="branding">
					<h1><a href="indexafterlogin.php"><span class="highlight">AuctioX</span> Web Page</a></h1>
				</div>
				<nav>
				<ul>
					<li class="current"<a href="indexafterlogin.php">Home</a></li>
					<li><a href="aboutafterlogin.php">About us</a></li>
					<li><a href="categoriesafterlogin.php">Categories</a></li>
					<li class="current"><a href="accountafterlogin.php">My Account(<?php session_Start();echo $_SESSION['utilizator']?>)</a></li>
					<li><a href="logout.php">
					Logout</a></li>
				
				
				</ul>
				</nav>
			</div>
		</header>
		
	<section id="showcase">
			<div class="container">
				<h1>AuctioX   Professional   Website</h1>
				<p>Buyers come prepared to buy – they want the items being sold!</p>
			</div>	
		</section>
		
		<section id="newsletter">
			<div class="container">
			<form action="search.php" method="POST">
				<input  type="text" name="search" placeholder="Search" required>
				<button type="submit" name="submit-search" class="button_1">Search</button>
			</form>

				
		</section>
<title> Marksheet
</title> 
<body>
<h1> Items details </h1>
<script>
	if(window.XMLHttpRequest)
		{	//firefox,opera,I7+
			xmlhttp=new XMLHttpRequest();
		}
		else
		{	//
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
xmlhttp.open("GET","licitatii.xml",false);
xmlhttp.send();
xmlDoc=xmlhttp.responseXML;

document.write("<table border='1' width='100%' style='font-size:35px;'>");
//Linia asta va scrie tabelul  in documentul html

document.write("<tr><th>NumeObiect</th><th>Descriere</th><th>Vanzator</th><th>DataLimita</th></th>");
var x=xmlDoc.getElementsByTagName("NumeleProdusului");
//Linia asta va stoca un array de obiece in variabila x-fast

for(i=0;i<x.length;i++)
{
	document.write("<tr><td>");
	document.write(xmlDoc.getElementsByTagName("NumeleProdusului")[i].childNodes[0].nodeValue);
	document.write("</td><td>");
	document.write(xmlDoc.getElementsByTagName("DescriereaProdusului")[i].childNodes[0].nodeValue);
	document.write("/</td><td>");
	document.write(xmlDoc.getElementsByTagName("Vanzator")[i].childNodes[0].nodeValue);
	document.write("/</td><td>");
	document.write(xmlDoc.getElementsByTagName("DataLimita")[i].childNodes[0].nodeValue);
	document.write("/</td><td>");
	

	
}
	document.write("</table>");


</script>

<footer>
			<p>AuctioX Web Page,Copyright &copy; 2018</p>
		</footer>
</body>
</html>