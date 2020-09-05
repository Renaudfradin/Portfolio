<div class = "block">
    <div class = "container">
        <div class="field is-grouped is-grouped-centered">
            <h1 class = "title is-1">Bonjour <?= $lesinfosvisi['nom']." ".$lesinfosvisi['prenom'] ?></h1>
        </div>
        <h5 class = "title is-5">Nom : <?= $lesinfosvisi['nom'] ?></h5>
        <h5 class = "title is-5">Prenom : <?= $lesinfosvisi['prenom']?></h5>
        <h5 class = "title is-5">Adresse : <?= $lesinfosvisi['adresse'] ?></h5>
        <h5 class = "title is-5">Code postal : <?= $lesinfosvisi['cp'] ?></h5>
        <h5 class = "title is-5">Date d'Embauche : <?= $lesinfosvisi['dateEmbauche'] ?></h5>
    </div>
    <div class="field is-grouped is-grouped-centered">
        <div class="control">
        <a href="index.php?uc=profil&action=modifcomptevisiteur"><button class="button is-black" name="">Modifier les informations du compte</button></a>
        </div>
    </div>
</div>
