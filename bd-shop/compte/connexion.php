<?php
require_once("connexiondb.php");

if (isset($_POST["formconnect"])) {

  $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
  $mdpconnect = sha1($_POST["mdpconnect"]);

  if (!empty($pseudoconnect) AND !empty($mdpconnect) ) {
    
    $requser = $bdd->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?");
    $requser->execute(array($pseudoconnect, $mdpconnect));
    $userexist = $requser->rowCount();

    if ($userexist == 1) {
      $userinfo = $requser->fetch();
      $_SESSION["id"] = $userinfo["id"];
      $_SESSION["pseudo"] = $userinfo["pseudo"];
      $_SESSION["mail"] = $userinfo["mail"];
      header("Location: profil.php?id=".$_SESSION["id"]);
    }
    else {
      $erreur ="mauvais pseudo ou mdp";
    }
  }
  else {
    $erreur =  "tous les champs doivent etre complet";
  }

}

?>


<head>
  <title>THE BD SHOP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="main.css">
  
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
      <li class="active"><a href="BD.php">Nos BD</a></li>
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
<div class="row">
    <div class="col-sm-2">
        <ul>
        




        </ul>    
    </div>
</div>


<div class="container" id="main-content">
    <div class="col-sm-10">
    <h1>connexion</h1>
  <br>
  <br>

<form method="POST"action="">
  <table>
  <tr>
    <td>
      <label for="pseudoconnect">Pseudo :</label>
    </td>
    <td>
      <input type="text" name="pseudoconnect" id="pseudoconnect" placeholder="votre pseudo" required>
    </td>
  </tr>

  <tr>
    <td>
      <label for="mdpconnect">Mot de passe :</label>
    </td>
    <td>
      <input type="password" name="mdpconnect" id="mdpconnect" placeholder="votre mot de passe" required>
    </td>
  </tr>


</table>
<input type="checkbox" name="remenberme" id="remenbercheckbox"/><label for="remenbercheckbox">se souvenir de moi </label>
<br><br>
<button type="submit" name="formconnect">connexion</button>
  </form>
  <a href="page-incription.php"><button>inscription</button></a>

  <a href="mdpoublier.php">Mot de passse oublier</a>

  <?php
if (isset($erreur)) {
  echo $erreur;
}
?>


    </div>



</body>
</html>
