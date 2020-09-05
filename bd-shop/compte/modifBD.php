<?php

require_once("connexiondb.php");
if (!isset($_SESSION['id']) AND $_SESSION['id'] !=4) {
  header('location:connexion.php');
  exit();
}
 

if(isset($_GET['modifier'])){

  $requserbd = $bdd->prepare("SELECT * FROM table12 WHERE id = ?");
  $requserbd->execute(array($_GET['modifier']));
  $bd = $requserbd->fetch();
  
  $requserbd1 = $bdd->prepare("SELECT * FROM table_resum WHERE id_ref1 = ?");
  $requserbd1->execute(array($_GET['modifier']));
  $bdresum = $requserbd1->fetch();


  if (isset($_POST["newref"]) AND !empty($_POST["newref"]) AND $_POST["newref"]) {

    $newref = htmlspecialchars($_POST["newref"]);
    $insertref = $bdd->prepare("UPDATE table12 SET ref = ? WHERE id = ?");
    $insertref->execute(array($newref,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }

  if (isset($_POST["newauteur"]) AND !empty($_POST["newauteur"]) AND $_POST["newauteur"]) {

    $newauteur = htmlspecialchars($_POST["newauteur"]);
    $insertref = $bdd->prepare("UPDATE table12 SET auteur = ? WHERE id = ?");
    $insertref->execute(array($newauteur,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }

  if (isset($_POST["newheros"]) AND !empty($_POST["newheros"]) AND $_POST["newheros"]) {

    $newheros = htmlspecialchars($_POST["newheros"]);
    $insertref = $bdd->prepare("UPDATE table12 SET heros = ? WHERE id = ?");
    $insertref->execute(array($newheros,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }

  if (isset($_POST["newtitre"]) AND !empty($_POST["newtitre"]) AND $_POST["newtitre"]) {

    $newtitre = htmlspecialchars($_POST["newtitre"]);
    $insertref = $bdd->prepare("UPDATE table12 SET titre = ? WHERE id = ?");
    $insertref->execute(array($newtitre,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }
  
  if (isset($_POST["newprixPublic"]) AND !empty($_POST["newprixPublic"]) AND $_POST["newprixPublic"]) {

    $newprixPublic = htmlspecialchars($_POST["newprixPublic"]);
    $insertref = $bdd->prepare("UPDATE table12 SET prixPublic = ? WHERE id = ?");
    $insertref->execute(array($newprixPublic,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }
  
  if (isset($_POST["newprixEditeur"]) AND !empty($_POST["newprixEditeur"]) AND $_POST["newprixEditeur"]) {

    $newprixEditeur = htmlspecialchars($_POST["newprixEditeur"]);
    $insertref = $bdd->prepare("UPDATE table12 SET newprixEditeur = ? WHERE id = ?");
    $insertref->execute(array($newprixEditeur,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }
  
  if (isset($_POST["newgenre"]) AND !empty($_POST["newgenre"]) AND $_POST["newgenre"]) {

    $newgenre = htmlspecialchars($_POST["newgenre"]);
    $insertref = $bdd->prepare("UPDATE table12 SET genre = ? WHERE id = ?");
    $insertref->execute(array($newgenre,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }

  if (isset($_POST["newrefEdit"]) AND !empty($_POST["newrefEdit"]) AND $_POST["newrefEdit"]) {

    $newrefEdit = htmlspecialchars($_POST["newrefEdit"]);
    $insertref = $bdd->prepare("UPDATE table12 SET refEdit = ? WHERE id = ?");
    $insertref->execute(array($newrefEdit,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }

  if (isset($_POST["newediteur"]) AND !empty($_POST["newediteur"]) AND $_POST["newediteur"]) {

    $newediteur = htmlspecialchars($_POST["newediteur"]);
    $insertref = $bdd->prepare("UPDATE table12 SET editeur = ? WHERE id = ?");
    $insertref->execute(array($newediteur,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }

  if (isset($_POST["newrefFournisseur"]) AND !empty($_POST["newrefFournisseur"]) AND $_POST["newrefFournisseur"]) {

    $newrefFournisseur = htmlspecialchars($_POST["newrefFournisseur"]);
    $insertref = $bdd->prepare("UPDATE table12 SET refFournisseur = ? WHERE id = ?");
    $insertref->execute(array($newrefFournisseur,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }

  if (isset($_POST["newfournisseur"]) AND !empty($_POST["newfournisseur"]) AND $_POST["newfournisseur"]) {

    $newfournisseur = htmlspecialchars($_POST["newfournisseur"]);
    $insertref = $bdd->prepare("UPDATE table12 SET fournisseur = ? WHERE id = ?");
    $insertref->execute(array($newfournisseur,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }

  if (isset($_POST["newresum"]) AND !empty($_POST["newresum"]) AND $_POST["newresum"]) {

    $newresum = htmlspecialchars($_POST["newresum"]);
    $insertref = $bdd->prepare("UPDATE table_resum SET resum = ? WHERE id_ref1 = ?");
    $insertref->execute(array($newresum,$_GET["modifier"]));
    header("Location:admin.php?modifier=".$_GET['modifier']);
  }


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
            
    <h2>Modifier une BD</h2>

              
<form method="POST"action="">
  <table>

  
  <tr>
    <td>
      <label for="newref">La refference:</label>
    </td>
    <td>
      <input type="text" name="newref" id="newref" placeholder="la refference" value="<?= $bd["ref"]; ?>">
    </td>
  </tr>

  <tr>
    <td>
      <label for="newauteur">Nom de l'auteur:</label>
    </td>
    <td>
      <input type="text" name="newauteur" id="newauteur" placeholder="Nom de l'auteur" value="<?= $bd["auteur"]; ?>">
    </td>
  </tr>

  <tr>
    <td>
      <label for="newheros">Nom de l'heros:</label>
    </td>
    <td>
      <input type="text" name="newheros" id="newheros" placeholder="Nom de l'heros" value="<?= $bd["heros"]; ?>">
    </td>
  </tr>

  <tr>
    <td>
      <label for="newtitre">Titrie de la BD:</label>
    </td>
    <td>
      <input type="text" name="newtitre" id="newtitre" placeholder="Titre de la BD" value="<?= $bd["titre"]; ?>">
    </td>
  </tr>

  <tr>
    <td>
      <label for="newprixPublic">Le prix du public:</label>
    </td>
    <td>
      <input type="text" name="newprixPublic" id="newprixPublic" placeholder="Le prix du public" value="<?= $bd["prixPublic"]; ?>">
    </td>
  </tr>

  <tr>
    <td>
      <label for="newprixEditeur">Le prix de l'editeur:</label>
    </td>
    <td>
      <input type="text" name="newprixEditeur" id="newprixEditeur" placeholder="Le prix de l'edieteur" value="<?= $bd["prixEditeur"]; ?>">
    </td>
  </tr>

  <tr>
    <td>
      <label for="newgenre">Le genre de la BD:</label>
    </td>
    <td>
      <input type="text" name="newgenre" id="newgenre" placeholder="Le genre de la BD" value="<?= $bd["genre"]; ?>">
    </td>
  </tr>

  <tr>
    <td>
      <label for="newrefEdit">La ref editeur:</label>
    </td>
    <td>
      <input type="text" name="newrefEdit" id="newrefEdit" placeholder="Le refEdit de la BD" value="<?= $bd["refEdit"]; ?>">
    </td>
  </tr>

  <tr>
    <td>
      <label for="newediteur">Nom de l'ediiteur:</label>
    </td>
    <td>
      <input type="text" name="newediteur" id="newediteur" placeholder="Nom de l'editeur" value="<?= $bd["editeur"]; ?>">
    </td>
  </tr>

  <tr>
    <td>
      <label for="newrefFournisseur">La ref fournisseur:</label>
    </td>
    <td>
      <input type="text" name="newrefFournisseur" id="newrefFournisseur" placeholder="Le refFournisseur" value="<?= $bd["refFournisseur"]; ?>">
    </td>
  </tr>

  <tr>
    <td>
      <label for="newfournisseur">Le fourniisseur:</label>
    </td>
    <td>
      <input type="text" name="newfournisseur" id="newfournisseur" placeholder="Le fournisseur" value="<?= $bd["fournisseur"]; ?>">
    </td>
  </tr>

  <tr>
    <td>
      <label for="newresum">La resumer:</label>
    </td>
    <td>
      <input type="text" name="newresum" id="newresum" placeholder="la resumer"   value="<?= $bdresum["resum"]; ?>">
    </td>
  </tr>

  
  <tr>
    <td>
      <label for="couverture">Image de couverture:</label>
    </td>
    <td>
      <input type="file" name="couverture" id="couverture"><br /><br />
    </td>
  </tr>

</table>
<button type="submit" name="ajoutbd1">Modifier la BD</button>

    </div>
</div>


</body>
</html>
