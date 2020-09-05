<div class = "block"><?php /*index.php?uc=modifcompte&action=modifcompte*/?>
    <div class = "container">
        <div class="field is-grouped is-grouped-centered">
            <h1 class = "title is-1">Modifier le profile de <?=$inf['nom']." ".$inf['prenom'] ?></h1>
        </div>
        <form method="POST" action="index.php?uc=modifcompte&action=modifcompte">

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">ID :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="ID" name = "id" id = "" value = "<?=$inf['id']?>">
          </div><br>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">NOM :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="NOM" name = "nom" id = "" value = "<?=$inf['nom']?>">
          </div><br>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">PRENOM :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="PRENOM" name = "prenom" id = "" value = "<?=$inf['prenom']?>">
          </div><br>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">LOGIN :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="PRENOM" name = "login" id = "" value = "<?=$inf['login']?>">
          </div><br>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">ADRESSE :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="ADRESSE" name="adresse" id = "" value = "<?=$inf['adresse']?>">
          </div><br>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">CP :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="CP" name="cp" id = "" value = "<?= $inf['cp']?>">
          </div><br>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">VILLE :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="VILLE" name="ville" id = "" value = "<?= $inf['ville']?>">
          </div><br>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">DATE EMBAUCHE : :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="VILLE" name="datembauche" id = "" value = "<?=$inf['dateEmbauche']?>">
          </div><br>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">MOT DE PASSE :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="MOT DE PASSE" name="newmdp1" id = "" value = "">
          </div><br>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">CONFIRMATION  MOT DE PASSE :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="CONFIRMATION  MOT DE PASSE" name="newmdp2" id = "" value = "">
          </div><br>

          <div class="field  is-grouped is-grouped-centered">
            <label class="label">STATUT DU COMPTE :</label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="VILLE" name="statu" id = "" value = "<?= $inf['statu-id']?>">
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

