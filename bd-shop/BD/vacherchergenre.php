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

    $genre = $_GET["genre"];
    echo $genre;
    echo "<br>";
    echo "<br>";

    $photoParPage = 10 ;
    $photoTotalesReq = $bdd->query("SELECT * FROM table12  WHERE genre='$genre'");
    $photoTotales = $photoTotalesReq->rowCount();
    //ceil permet d arrondir un resulta au superrieur
    $pageTotales = ceil($photoTotales/$photoParPage);

    if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0) {

        $_GET['page'] = intval($_GET['page']);
        $pageCourante = $_GET['page'];
    }else{
        $pageCourante = 1 ;
    }

  

    $depart = ($pageCourante-1)*$photoParPage;

    $reqSql = $bdd->prepare("SELECT * FROM table12  WHERE genre='$genre' LIMIT $depart,$photoParPage ");
    $reqSql ->execute();

    while($row = $reqSql ->fetch(PDO::FETCH_OBJ)) {
        
        $ex = strtolower($row->ref);
        $filname = 'C:\wamp64\www\_Projet bandes dessinées\couv\\'.$ex.'.jpg';
        
         if(file_exists ( $filname )) {
            echo '<a href="vachercher.php?ref='.$ex.'"><img src="'.'../couv/'.strtolower($row->ref).'.jpg"'.'alt="'.$row->titre.'" /></a>';
            echo"<br>";
            echo "$row->titre","<br>","$row->auteur","<br>","$row->prixPublic",'<a href="../back-end/magasin.php?ajouterarticle='.$ex.'">magasin</a>',"<br><br>";
            
          }
         else { 
            echo '<a href="vachercher.php?ref='.$ex.'"><img src="'   .   '../couv/defaut.jpg"' . 'title="' .$row->titre. '" /></a>';
            echo"<br>";
            echo "$row->titre","<br>","$row->auteur","<br>","$row->prixPublic",'<a href="../back-end/magasin.php?ajouterarticle='.$ex.'">magasin</a>',"<br><br>";
              
         }
    }

    for ($i=1; $i <= $pageTotales; $i++) { 
        echo "<a href='vacherchergenre.php?genre=$genre&page=$i'>$i   </a>";
    
    }
?>
    </div>
</div>


</body>
</html>



































