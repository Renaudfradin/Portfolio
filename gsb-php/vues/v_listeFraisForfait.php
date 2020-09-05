
<div class = "block">
<div class = "container">  
  <div class="field is-grouped is-grouped-centered">
    <h2 class = "title is-2">Renseigner ma fiche de frais du mois <?= $numMois."-".$numAnnee ?></h2>
  </div>
  <div class="field is-grouped is-grouped-centered">
    <h3 class = "title is-3">Eléments forfaitisés</h3>
  </div>
  <form method="POST" action="index.php?uc=gererFrais&action=validerMajFraisForfait">
  <?php foreach ($lesFraisForfait as $unFrais)
          {
            $idFrais = $unFrais['idfrais'];
            $libelle = $unFrais['libelle'];
            $quantite = $unFrais['quantite'];
          ?>
          <div class="field  is-grouped is-grouped-centered">
            <label class="label"><?=$libelle?></label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="<?=$libelle?>" name="lesFrais[<?= $idFrais?>]" id = "" value = "<?=$quantite?>">
          </div>
          <br>
          <?php } ?>
          <div class="field is-grouped is-grouped-centered">
            <div class="control">
              <button class="button is-black" name="">VALIDER</button>
            </div>
          </div>
  </form>
</div>
</div>
    