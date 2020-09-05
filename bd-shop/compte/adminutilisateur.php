<?php

require_once("connexiondb.php");

if (!isset($_SESSION['id']) AND $_SESSION['id'] !=4) {
    header('location:connexion.php');
    exit();
}else{
    if(isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {
    $supprime = (int) $_GET['supprimer'];
    $suppmenbres = $bdd->prepare('DELETE FROM user WHERE id = ?');
    $suppmenbres->execute(array($supprime));
 }
}

$membres = $bdd->query('SELECT * FROM user ORDER BY id DESC');



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
    <br>
    <h2>Gerer les Utilisateurs</h2>

    <ul>
        <?php while($m =$membres->fetch()){  ?>
        <li>
        <?= $m['id'] ?> : <?= $m['pseudo'] ?> 
            <a href="adminutilisateur.php?supprimer= <?= $m['id']?> "> 
            <button>Supprimer</button>
            </a>
        </li>
        <?php } ?>
        <br>
        
        <a href="admin.php"><button>Retourner en arriere</button></a>
    </ul>
    </div>
</div>


</body>
</html>


