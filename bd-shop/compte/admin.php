<?php
require_once("connexiondb.php");

if (!isset($_SESSION['id']) AND $_SESSION['id'] !=4) {
    header('location:connexion.php');
    exit();
}else{
    
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
<?php
    if (isset($_POST['ajoutbd']) ) {


        if (!empty($_POST['ref'])AND !empty($_POST['auteur']) AND !empty($_POST['heros']) AND!empty($_POST['titre']) AND !empty($_POST['prixPublic']) AND !empty($_POST['prixEditeur'])AND !empty($_POST['genre']) AND !empty($_POST['editeur']) AND !empty($_POST['fournisseur']))
        {
         
          $ref = htmlspecialchars($_POST['ref']);
          $auteur = htmlspecialchars($_POST['auteur']);
          $heros = htmlspecialchars($_POST['heros']);
          $titre = htmlspecialchars($_POST['titre']);
          $prixPublic = htmlspecialchars($_POST['prixPublic']);
          $prixEditeur = htmlspecialchars($_POST['prixEditeur']);
          $genre = htmlspecialchars($_POST['genre']);
          $refEdit = htmlspecialchars($_POST['refEdit']);
          $editeur = htmlspecialchars($_POST['editeur']);
          $refFournisseur = htmlspecialchars($_POST['refFournisseur']);
          $fournisseur = htmlspecialchars($_POST['fournisseur']);
          $resum = htmlspecialchars($_POST['resum']);
          $id_ref1 = htmlspecialchars($_POST['id_ref1']);
          
          
    
          $inserbd = $bdd->prepare("INSERT INTO `table12`(`ref`, `auteur`, `heros`, `titre`, `prixPublic`, `prixEditeur`, `genre`,refEdit,`editeur`,refFournisseur,`fournisseur`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
          $inserbd ->execute(array($ref, $auteur, $heros, $titre, $prixPublic, $prixEditeur, $genre, $refEdit, $editeur, $refFournisseur, $fournisseur));
          
          $inserbd1 = $bdd->prepare("INSERT INTO `table_resum`(`resum`,`id_ref1`) VALUES (?,?)");
          $inserbd1 ->execute(array($resum, $id_ref1));
          $msg="<p>BD ajouter</p>";
         
      }
    
    }
    
    $bandedessiné = $bdd->query('SELECT * FROM table12 ORDER BY id DESC');
    ?>
<div class="container" id="main-content">
    <div class="col-sm-12">

            <h1>ESPACE ADMINISTRATEUR</h1>
            
            <h2>Ajouter une BD</h2>

               
            <form method="POST"action="">

            <?php $BD =$bandedessiné->fetch() ?>
            Dernierre BD rentré:<?= $BD['titre'] ?><br>
            ID:<?= $BD['id'] ?> 
            <br>
            <br>
            <table>
            <tr>
                <td>
                    <label for="ref">La refference:</label>
                </td>
                <td>
                    <input type="text" name="ref" id="ref" placeholder="la refference" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="auteur">Nom de l'auteur:</label>
                </td>
                <td>
                    <input type="text" name="auteur" id="auteur" placeholder="Nom de l'auteur" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="heros">Nom de l'heros:</label>
                </td>
                <td>
                    <input type="text" name="heros" id="heros" placeholder="Nom de l'heros" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="titre">Titre de la BD:</label>
                </td>
                <td>
                    <input type="text" name="titre" id="titre" placeholder="Titre de la BD" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="prixPublic">Le prix du public:</label>
                </td>
                <td>
                    <input type="text" name="prixPublic" id="prixPublic" placeholder="Le prix du public" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="prixEditeur">Le prix de l'editeur:</label>
                </td>
                <td>
                    <input type="text" name="prixEditeur" id="prixEditeur" placeholder="Le prix de l'edieteur" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="genre">Le genre de la BD:</label>
                </td>
                <td>
                    <input type="text" name="genre" id="genre" placeholder="Le genre de la BD" required>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label for="refEdit">Nom ref de l'editeur:</label>
                </td>
                <td>
                    <input type="text" name="refEdit" id="refEdit" placeholder="Nom de ref l'editeur" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="editeur">Nom de l'editeur:</label>
                </td>
                <td>
                    <input type="text" name="editeur" id="editeur" placeholder="Nom de l'editeur" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="refFournisseur">Le refFournisseur:</label>
                </td>
                <td>
                    <input type="text" name="refFournisseur" id="refFournisseur" placeholder="Le refFournisseur" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="fournisseur">Le fournisseur:</label>
                </td>
                <td>
                    <input type="text" name="fournisseur" id="fournisseur" placeholder="Le fournisseur" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="resum">Le resum:</label>
                </td>
                <td>
                    <input type="text" name="resum" id="resum" placeholder="Le resum" required>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label for="id_ref1">Le id_ref1:</label>
                </td>
                <td>
                    <input type="text" name="id_ref1" id="id_ref1" placeholder="Le id_ref1" required>
                </td>
            </tr>


            </table>
            
            <button class="btnbd1" type="submit" name="ajoutbd">Ajouter la BD</button>
            </form>
            <a href="adminutilisateur.php"><button class="btnutil">Gerer les Utilisateurs</button></a>
            <a href="adminBD.php"><button class="btnbd">Voir les BD</button></a>
<?php
  if (isset($msg)) {
    echo $msg;
  }
  ?>

    </div>
</div>


</body>
</html>
