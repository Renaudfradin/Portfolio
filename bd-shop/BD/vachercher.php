<?php
session_start();
require_once("connexiondb.php");
?>
<head>
  <title>THE BD SHOP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../main.css">
  <?php
  require_once("../boostrap-inc.php");
  ?>
</head>
<body>

<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../accueille.php">The BD SHOP</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="genre.inc.php">Nos BD</a></li>
      <li><a href="#">Nous trouver</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="../magasin/magasin.html"><span class="glyphicon glyphicon-shopping-cart"></span>Magasin</a></li>
      <?php
					if (!isset($_SESSION["id"])) {
						echo "<li><a href='../compte/connexion.php'><span class='glyphicon glyphicon-user id='inscrip''></span>Connexion</a></li>";
					}else {
            $getid1 = intval($_SESSION["id"]);
            $p = $bdd->prepare("SELECT * FROM user WHERE id = ?");
            $p->execute(array($getid1));
            $p1 = $p->fetch();
                        ?>
                            <li><a href='../compte/profil.php?id=<?=$_SESSION['id'] ?>'><span class='glyphicon glyphicon-user' id="inscrip"></span><?=$p1['pseudo'] ?></a></li>
                        <?php
                    }
                    ?>
                   
      <li><a href="../compte/page-incription.php"><span class="glyphicon glyphicon-log-in"  id="inscrip"></span>Inscription</a></li>
    </ul>
   
  </div>
</nav>

<div class="row">
    <div class="col-sm-3">




    </div>
</div>


<div class="container" id="main-content">
    <div class="col-sm-9">
        
    <?php


    $reference =  basename($_GET['ref'], ".jpg");
    $reference =  strtoupper($reference);

    $reqSql = $bdd->prepare("SELECT * FROM table12 INNER JOIN table_resum 
    WHERE table12.id = table_resum.id_ref1 AND ref='$reference'");
    $reqSql -> execute();

    echo '<pre>';
    

    $row = $reqSql->fetch(PDO::FETCH_ASSOC);

    $genre = $_GET["genre"];
    $reqSql1 = $bdd->prepare("SELECT * FROM table12  WHERE genre='$genre'");
    $reqSql1 ->execute();

    $row1 = $reqSql1->fetch(PDO::FETCH_OBJ);
?>
<?php
$ex = strtolower($row1->ref);
$filname = 'C:\wamp64\www\THE-BD-SHOP\couv\\'.$ex.'.jpg';
echo'<img src="'.'../couv/'.strtolower($row1->ref).'.jpg"'.'alt="'.$row1->titre.'" />';
?>



Le titre : <?php echo $row["titre"]; ?>
  <br>
Le prix : <?php echo $row["prixPublic"]; ?> €
  <br>
Le genre : <?php echo $row["genre"]; ?>
  <br>
L'editeur :<?php echo $row["editeur"]; ?>
  <br>
Le resumer :<?php echo $row["resum"]; ?>
  <br>
    </div>
</div>



</body>
</html>