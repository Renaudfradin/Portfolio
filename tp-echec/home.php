<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style1echec.css">
	<link rel="icon" href="../image/logo.ico"/>
    <title>TP-echec</title>
</head>
<body>
<style type="text/css">

  </style>
<?php
$colmax=8;
$ligmax=8;
$cop=-1;
$fendata = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR";//$_POST['fen'];


$pp = str_replace("8",(str_repeat("8",8)),$fendata);

$fentableau = array (
	"8"  => "<img src='img/vide.png'>" ,
	
	"r" => "<img src='img/tourn.png'>" ,
	"n" => "<img src='img/cavaliern.png'>" ,
	"b" => "<img src='img/foun.png'>" , 
	"k" => "<img src='img/roin.png'>" , 
	"q" => "<img src='img/damen.png'>" ,

	"p" => "<img src='img/pionn.png'>" , 

	"R" => "<img src='img/tour_b.png'>" ,
	"N" => "<img src='img/cavalier_b.png'>" , 
	"B" => "<img src='img/fou_b.png'>" , 
	"K" => "<img src='img/roi_b.png'>" , 
	"Q" => "<img src='img/dame_b.png'>" ,

	"P" => "<img src='img/pion_b.png'>" 
);

$fencoriger12 = str_replace("/", "",$pp);
$split = str_split($fencoriger12);




echo "<table>";
for ($lig=$ligmax; $lig>0; $lig--){

	echo "<tr>";


	for ($col=1; $col<=$colmax; $col++){
		$cop=$cop+1;
		$couleur=(($lig+$col)%2==0)?"clair":"sombre"; //Operateur ternaire
		$ppaa = $fentableau[$split[$cop]];
        echo "<td class=\"$couleur\">$ppaa</td>";
        
	}
	echo "</tr>";
}
echo "</table>";

?>
<form action="home.php" method="post">
<img src="" alt="">
        <label for="">FEN</label>
        <input type="text" name="fen" id="fen">

        <button type="submit" name="btnOK1">OK</button>
		
</form>
</body>
</html>