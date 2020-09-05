<div class = "blockimg">
  <a href="index.php?uc=accueil"><img src="./images/logo.jpg" alt="" srcset=""></a>
</div>
<br>
<nav class = "navbar is-dark" id = "navbar" role = "navigation">
    <div class = "navbar-start" id = "navbar1">
      <a href="index.php?uc=accueil" class = "navbar-item">Acceuil</a>
      <a href="index.php?uc=gererFrais&action=saisirFrais" class = "navbar-item">Saisie fiche de frais</a>
      <a href="index.php?uc=etatFrais&action=selectionnerMois" class = "navbar-item">Mes fiches de frais</a>
      <a href="index.php?uc=profil&action=profile" class = "navbar-item"><?= $_SESSION['prenom']." ".$_SESSION['nom'] ?></a>
      <a href="index.php?uc=connexion&action=deconnexion" class = "navbar-item">Déconnexion</a>
    </div>
</nav>
