<?php
session_start();
require_once("connexiondb.php");
?>
<head>
  <title>THE BD SHOP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style1.css">
  <link rel="icon" href="../image/logo.ico"/>
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
    <div class="col-sm-2">
    <?php 
    $reqSql = $bdd->prepare("SELECT DISTINCT genre FROM table12");
    $reqSql ->execute();

    while ($row = $reqSql ->fetch(PDO::FETCH_OBJ)) {
        if($row->genre!=""){echo "<ul><li><a class='liste' href='vacherchergenre.php?genre=$row->genre'>$row->genre</a></li></ul>";
        }
    };

    //echo "succeslist";
    ?>
    </div>
</div>

<?php

?>

<div class="col-sm-8">
  <h1>TOUTES NOS BD</h1>
      

    <?php
    //pagination
    $bdparpagges = 15;
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
    //finpagination
    $depart = ($pagecourantes-1)*$bdparpagges;
    $bandedessiné = $bdd->query("SELECT * FROM table12 LIMIT $depart,$bdparpagges");
    //$bandedessiné1 = $bdd->query("SELECT * FROM table_resum");
     
while ($row = $bandedessiné ->fetch(PDO::FETCH_OBJ)) {
   
        $ex = strtolower($row->ref);
        $filname = 'C:\wamp64\www\THE-BD-SHOP\couv\\'.$ex.'.jpg';
            ?>
        <div class="tableau"> 
          
          <?php 

        if(file_exists ( $filname )) {
          ?>
          <div class="bd">
            <?php
            echo "<table>";
            echo "<tr>";
                    echo '<a href="vachercher.php?ref='.$ex.'"><img src="'.'../couv/'.strtolower($row->ref).'.jpg"'.'alt="<p>'.$row->titre.'</p>" width=150 height=200/></a><br>';
                    ?>
                    <div class="interieurb">
                      <?php
                    echo "$row->titre<br>";
                    echo "De: $row->auteur<br>";
                    echo "$row->prixPublic $<br>";
                    echo "Editeur:$row->fournisseur<br>";
                    echo "<a href='../back-end/magasin.php?ajouterarticle='.$ex.''><button class='btnacheter'>Acheter</button></a>"; 
                    ?>
                    </div>
                      <?php
                           
            echo "</tr>";
            echo "<br>";
            echo "</table>";
            echo "<br>";
            ?>
          </div>
          <?php   
        }else{ 
          ?>
          <div class="bd">
            <?php

            echo "<table>";
            echo "<tr>";
                    echo '<a href="vachercher.php?ref='.$ex.'"><img src="'   .   '../couv/defaut.jpg"' . 'title="' .$row->titre. '"  width=150 height=200 /></a>';
                    ?>
                    <div class="interieurb">
                      <?php
                    echo "$row->titre<br>";
                    echo "De: $row->auteur<br>";
                    echo "$row->prixPublic $<br>";
                    echo "Editeur:$row->fournisseur<br>";
                    echo "<a href='../back-end/magasin.php?ajouterarticle='.$ex.''><button class='btnacheter1'>Acheter</button></a>'";

                    ?>
                    </div>
                      <?php
            echo "</tr>";
            echo "</table>";
            echo "<br>";
            ?>
            </div>
            <?php
            }
       }
        ?>
       </div>
       <?php 
        $i = 1;
        for ($i=1; $i <= $bdtotals1; $i++) 
        { 
            echo "<a href='genre.inc.php?page=$i'> <button class='btnpage'>$i</button> </a>";
        } 
        ?>
</div>
  
</body>
</html>




