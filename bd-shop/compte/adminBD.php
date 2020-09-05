<?php
require_once("connexiondb.php");

if (!isset($_SESSION['id']) AND $_SESSION['id'] !=4) {
    header('location:connexion.php');
    exit();
}else{
    
}



$bdparpagges = 25;
$bdtotalsreq = $bdd->query("SELECT * FROM table12");
$bdtotals = $bdtotalsreq->rowCount();

$bdtotals1 = ceil($bdtotals/$bdparpagges);

if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0) {
    //pour securiser un peux on peut juste mettre des chiffre
    $_GET['page'] = intval($_GET['page']);
    $pagecourantes = $_GET['page'];

}else{
    $pagecourantes = 1 ;
}

//echo $pagecourantes;
$depart = ($pagecourantes-1)*$bdparpagges;


$bandedessiné = $bdd->query("SELECT * FROM table12 ORDER BY id DESC LIMIT $depart,$bdparpagges");
$bandedessiné1 = $bdd->query("SELECT * FROM table_resum ORDER BY id DESC ");


if(isset($_GET['supprimerb']) AND !empty($_GET['supprimerb'])) {
    $supprimebd = (int) $_GET['supprimerb'];

    $suppmenbresbd1 = $bdd->prepare('DELETE FROM table_resum WHERE id_ref1 = ? ');
    $suppmenbresbd1->execute(array($supprimebd));
    $suppmenbresbd = $bdd->prepare('DELETE FROM table12 WHERE id = ? ');
    $suppmenbresbd->execute(array($supprimebd));
    echo "Bd supp";
 }

?>

<html>
<head>
  <title>THE BD SHOP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../main.css">
  
  <?php
  require_once("boostrap-inc.php");
  ?>
  
</head>
<body>

<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../accueille.php">The BD SHOP</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../BD/genre.inc.php">Nos BD</a></li>
      <li><a href="#">Nous trouver</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="../magasin/magasin.html"><span class="glyphicon glyphicon-shopping-cart"></span>Magasin</a></li>
      <?php
					if (!isset($_SESSION["id"])) {
						echo "<li><a href='connexion.php'><span class='glyphicon glyphicon-user'></span>Connexion</a></li>";
					}else{
                        $getid1 = intval($_SESSION["id"]);
                        $p = $bdd->prepare("SELECT * FROM user WHERE id = ?");
                        $p->execute(array($getid1));
                        $p1 = $p->fetch();
            ?>
			      <li><a href='profil.php?id=<?=$_SESSION['id'] ?>'><span class='glyphicon glyphicon-user'></span><?=$p1['pseudo'] ?></a></li>";
              <?php
          }  ?>
      <li><a href="page-incription.php"><span class="glyphicon glyphicon-log-in"></span>inscription</a></li>
    </ul>
   
  </div>
</nav>

<div class="container" id="main-content">
    <div class="col-sm-12">

    <h1>ESPACE ADMINISTRATEUR</h1>
            
    <h2>TOUTE LES BD</h2


    <ul>
    <?php while($BD =$bandedessiné->fetch() AND $BD1 =$bandedessiné1->fetch()) { ?>
    <li><?= $BD['ref'] ?> :id <?= $BD['id'] ?> :idref <?= $BD1['id_ref1'] ?>: <?=  $BD['auteur'] ?> :<?=  $BD['titre'] ?> <?php ?><a href="modifBD.php?modifier=<?= $BD['id']?> "> <button>Modifier la BD</button>  <a href="adminBD.php?supprimerb= <?= $BD['id'] ?>"><button>Supprimer</button></a></a></li>
    <?php
    
    }
    for ($i=1; $i <= $bdtotals1; $i++) { 
        echo "<a href='adminBD.php?page=$i'>$i   </a>";
     } 
    ?>

    </ul>

    <a href="admin.php"><button>Retourner en arriere</button></a>

    </div>
</div>
</body>
</html>


