
<head>
  <title>THE BD SHOP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="main.css">
  <link rel="icon" href="../image/logo.ico"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="accueille.php">The BD SHOP</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="BD/genre.inc.php">Nos BD</a></li>
      <li><a href="#">Nous trouver</a></li>
    </ul>

    

    <ul class="nav navbar-nav navbar-right">
      <li><a href=""#"><span class="glyphicon glyphicon-shopping-cart"></span>Magasin</a></li>
      <?php
					if (!isset($_SESSION["id"])) {
						echo "<li><a href='compte/connexion.php'><span class='glyphicon glyphicon-user id='inscrip''></span>Connexion</a></li>";
					}else { 
            $getid1 = intval($_SESSION["id"]);
            
            $p = $bdd->prepare("SELECT * FROM user WHERE id = ?");
            $p->execute(array($getid1));
            $p1 = $p->fetch();
            
            ?>
			      <li><a href='compte/profil.php?id=<?=$_SESSION['id'] ?>'><span class='glyphicon glyphicon-user' id="inscrip"></span><?=$p1['pseudo'] ?></a></li>";
      <?php  }?>
      <li><a href="compte/connexion.php"><span class="glyphicon glyphicon-log-in"  id="inscrip"></span>Inscription</a></li>
    </ul>
   
  </div>
</nav>
  

<div class="container">
  <h3>Livres BD et Comics</h3>
  <p>Amateurs de BD classiques ou de comics, vous trouverez de quoi combler votre amour du 9ème art dans notre rayon dédié, pour faire vos achats de BD pas chères ou vos achats de comics. Que ce soient les sagas indémodables, Astérix ou Thorgal par exemple, les bandes dessinées indépendantes plus pointues comme celles de Bastien Vivès ou de Christophe Blain, les genres appréciés comme le Policier et thriller, la BD historique ou le Fantastique et SF, ou enfin les comics ou BD Marvel, le choix est infini ! Grâce à nos prix réduits, en occasion, vous pourrez très facilement compléter votre collection de bandes dessinées ! Petit conseil : pensez à consulter nos Bonnes Affaires en BD et Comics !</p>
   
  <br>
   
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
  
      
      <div class="carousel-inner">
        <div class="item active">
          <img src="1516701332_startseitenteaser_sale_desktop_fr.png" alt="Los Angeles" style="width:40%;">
        </div>
  
        <div class="item">
          <img src="bandeau_river2019.jpg" alt="Chicago" style="width:40%;">
        </div>
      
        <div class="item">
          <img src="martel_2019.jpg" alt="New york" style="width:40%;">
        </div>
      </div>
  
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br>

    <p>The bd shop est une boutique en ligne moderne avec une des plus grandes sélections de livres d'occasion à bas prix. Parcourez les différentes catégories comportant plus d'un million d'articles et de produits multimédias d'occasion et économisez jusqu'à -70 pour cent sur les prix d'origine. Vous aimez lire ou même avoir une collection de jeux, CD et DVD, alors vous savez que ces loisirs sont relativement coûteux. Sur momox-shop.fr vous achetez des livres d'occasion, des CD, des DVD ou des jeux à des prix imbattables avec les avantages des boutiques en ligne, cela protège l'environnement et votre porte-monnaie.

      Vos avantages avec momox-shop.fr:

      La qualité de tous les articles est vérifiée. Ceux-ci sont en bon ou en très bon état. Ainsi, vous achetez des objets de seconde main et de qualité à petits prix sur momox-shop.fr
      À partir d'un montant de commande de 15 euros, la livraison est gratuite pour la France métropolitaine.
      Choisissez votre mode de paiement: Paypal, carte de crédit, Carte bleue.
      Un grand choix à des prix très raisonnables:
      dans l'offre vaste et variée de momox-shop.fr vous trouverez de nombreux livres et autres articles de loisirs d'occasion à bas prix. Vous pouvez y trouver non seulement de bonnes affaires, des livres bon marché, dont des auteurs à succès tels que Charlotte Link, Nora Roberts et Simon Beckett, mais aussi des éditions récentes ainsi que des livres introuvables dans les boutiques en ligne. En plus des livres, vous pouvez également acheter des CD d'occasion sur momox-shop.fr. Vous disposez d’un vaste choix de CD d'artistes tels que Metallica, Rammstein ou Michael Jackson. Vous préférez regarder des DVD? Les cinéphiles trouveront dans nos magasins des DVD à bas prix et des Blu-rays de genres différents. Les grands classiques du cinéma y côtoient les films les plus récents et les séries TV. Pour les amateurs de jeux vidéo, momox-shop.fr propose de nombreux jeux pour les différentes consoles telles que la Wii, la Nintendo DS et la Playstation 2 à des prix très bas.

      Nous vous invitons à parcourir régulièrement nos offres, car nous ajoutons chaque jour jusqu’à 50.000 nouveaux articles à notre gamme de produits d’occasion dans les catégories livres
    </p>
  
</div>
  


</body>
</html>

