<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8" />
	 <title>Affichage en ligne avec Array - SANS calcul du Nbreligne</title>
</head>
<body>

<?php
// $NbrCol : le nombre de colonnes
// $NbrLigne : calcul automatique a la FIN
// -------------------------------------------------------
// (exemple)
$NbrCol = 6;
$tableau = array('elt0','elt1','elt2','elt3','elt4','elt5','elt1','elt2','elt1','elt2','elt2','elt3','elt4','elt5','elt1','elt2','elt1','elt2','elt2','elt3','elt4','elt5','elt1','elt2','elt1','elt2');
// -------------------------------------------------------
// nombre de cellules à remplir
$NbreData = count($tableau);
// -------------------------------------------------------
// affichage
$NbrLigne = 0;
if ($NbreData != 0) 
{
	$k = 0; // indice du tableau
?>
	<table>
	<tbody>
<?php
	while ($k < $NbreData) 
	{
		if (($k+1)%$NbrCol == 1) 
		{
			$NbrLigne++;
			$fintr = 0;
        ?>
        <tr>
        <?php
		}
        ?>
			<td>
            <?php
			// -------------------------
			// DONNEES A AFFICHER dans la cellule
			echo $tableau[$k];
			// -------------------------
            ?>
			</td>
        <?php
		if (($k+1)%$NbrCol == 0) {
			$fintr = 1;
            ?>		</tr>
            <?php
		}
		$k++;
	}
	// fermeture derniere balise /tr
	if ($fintr!=1) {
        ?>		</tr>
        <?php
        } 
        ?>
	</tbody>
	</table>
<?php
} else { ?>
	pas de données à afficher
<?php
}
?>

</body>
</html>