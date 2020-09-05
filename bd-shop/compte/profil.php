<?php
require_once("connexiondb.php");

if (isset($_GET["id"]) AND $_GET["id"] > 0){
    $getid = intval($_GET["id"]);
    $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
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
      <li class="active"><a href="BD.php">Nos BD</a></li>
      <li><a href="#">Nous trouver</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="../magasin/magasin.html"><span class="glyphicon glyphicon-shopping-cart"></span>Magasin</a></li>
      <?php
					if (!isset($_SESSION["id"])) {
						echo "<li><a href='connexion.php'><span class='glyphicon glyphicon-user'></span>Connexion</a></li>";
					}else{
            $getid1 = intval($_GET["id"]);
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
        
    <h1>Bonjour <?php echo $userinfo["civilite"]; ?> <?php echo $userinfo["prenom"]; ?> <?php echo $userinfo["nom"]; ?></h1>

<br>
<br>


<div class="div1">
  <div class="infavatar" >
    <br>
<p class="info">MES INFORMATIONS</p>
<br>
<?php
if (!empty($userinfo["avatar"])) {
  ?>
  <img class="avatar" src="membres/avatars/<?php echo $userinfo['avatar'];?>"  width="150" height="150"/>

<?php
}
?>


<?php
if (isset($_SESSION["id"]) AND $userinfo["id"] == $_SESSION["id"]) {
?>

  </div>
Civilite : <?php echo $userinfo["civilite"]; ?>
<br>
Premon : <?php echo $userinfo["prenom"]; ?>
<br>
Nom : <?php echo $userinfo["nom"]; ?>
<br>
Pseudo :<?php echo $userinfo["pseudo"]; ?>
<br>
Email :<?php echo $userinfo["mail"]; ?>
<br>
Date de naissance :<?php echo $userinfo["datedenaissance"]; ?>
<br>
Age :<?php echo $userinfo["age"]; ?>
<br>
Code postal :<?php echo $userinfo["postal"]; ?>
<br>
Adresse : <?php echo $userinfo["adresse"]; ?>
<br>
Pays : <?php echo $userinfo["pays"]; ?>
<br>
Ville : <?php echo $userinfo["ville"]; ?>
<br>
N°telephone : <?php echo $userinfo["phone"]; ?>
<br>




<a  href="editionprofil.php"><button class="bouton1">MODIFIER LE PROFIL</button></a>
<br>
<a href="deconnexion.php"><button class="bouton1">DECONNEXION</button></a>
<br>
<a href="envoie.php"><button>envyer un mesage</button></a>
<br>
<a href="reception.php"><button>boite de reception</button></a>
<br>
<a href="mail.php"><button>mail</button></a>
<br>

<?php
if (isset($_SESSION['id']) AND $_SESSION['id'] ==4) {
    ?>
        <a href="admin.php"><button>Gerer le site</button></a>
    <?php
}else{

      echo "";

}
?>

</div>
<?php
}
?>



</div>


</body>
</html>
