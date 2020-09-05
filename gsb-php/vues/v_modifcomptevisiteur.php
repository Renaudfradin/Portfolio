<div class = "block">
    <div class = "container">
        <div class="field is-grouped is-grouped-centered">
            <h1 class = "title is-1">Modifier votre profile <?= $lesinfosvisi['nom']." ".$lesinfosvisi['prenom'] ?></h1>
        </div>
        <form method="POST" action="index.php?uc=profil&action=modifcomptevisiteur">
  
          <div class="field  is-grouped is-grouped-centered">
            <label class="label">NOM :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="NOM" name = "nom1" id = "" value = "<?= $lesinfosvisi['nom']?>">
          </div>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">PRENOM :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="PRENOM" name = "prenom1" id = "" value = "<?= $lesinfosvisi['prenom']?>">
          </div>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">ADRESSE :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="ADRESSE" name="adresse1" id = "" value = "<?= $lesinfosvisi['adresse']?>">
          </div>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">CP :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="CP" name="cp1" id = "" value = "<?= $lesinfosvisi['cp']?>">
          </div>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">VILLE :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="VILLE" name="ville1" id = "" value = "<?= $lesinfosvisi['ville']?>">
          </div>
          
          <div class="field  is-grouped is-grouped-centered">
            <label class="label">MOT DE PASSE :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="MOT DE PASSE" name="mdp1" id = "" value = "">
          </div>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">CONFIRMATION  MOT DE PASSE :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="CONFIRMATION  MOT DE PASSE" name="mdp2" id = "" value = "">
          </div>
          <br>
          <div class="field is-grouped is-grouped-centered">
            <div class="control">
              <button class="button is-black" name="">ENREGISTRE LES MODIFICATIONS</button>
            </div>
          </div>
        </form>     
    </div> 
</div>

