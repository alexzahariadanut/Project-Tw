<?php



$con = mysqli_connect('127.0.0.1','root','');



if(!$con)

	echo "Could not connect to mysql server";

	

if(!mysqli_select_db($con,'auctiox'))

{

	echo "Database Not Selected";

}



$sql = "SELECT * FROM auctions join products on auctions.seller_id=products.seller_id ";



$records = mysqli_query($con,$sql);



require("fpdf.php");



$pdf = new FPDf('p','mm','A4');



$pdf->AddPage();



$pdf->SetFont('Arial','B',14);



$pdf->cell(75,10,"Name",1,0,'C');

$pdf->cell(50,10,"StartDate",1,0,'C');

$pdf->cell(50,10,"EndDate",1,0,'C');

$pdf->cell(23,10,"Ct_Id",1,0,'C');





$pdf->SetFont('Arial','',14);



while($row = mysqli_fetch_array($records))

{

	$pdf->cell(75,10,$row['product_name'],1,0,'C');

	$pdf->cell(50,10,$row['start_date'],1,0,'C');

	$pdf->cell(50,10,$row['end_date'],1,0,'C');

    $pdf->cell(23,10,$row['category_id'],1,1,'C');

}



$pdf->OutPut();







?>