<div class = "block">
<div class = "container">  
  <div class="field is-grouped is-grouped-centered">
    <h2 class = "title is-2">Mes fiches de frais</h2>
  </div>
    <form method="POST" action="index.php?uc=etatFrais&action=voirEtatFrais">
      <div class="field has-addons has-addons-centered">
        <div class="field is-narrow">
          <div class="control">
            <div class="select is-fullwidth">
              <select name="lstMois">
                <?php
                foreach ($lesMois as $unMois)
                {
                  $mois = $unMois['mois'];
                  $numAnnee =  $unMois['numAnnee'];
                  $numMois =  $unMois['numMois'];
                if($mois == $moisASelectionner){?>
                  <option selected value="<?=$mois ?>"><?= $numMois."/".$numAnnee ?> </option>
                <?php 
                }else{ ?>
                  <option value="<?=$mois ?>"><?= $numMois."/".$numAnnee ?> </option>
                <?php 
                  }
                }?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="field is-grouped is-grouped-centered">
        <div class="control">
          <button class="button is-black" name="">VALIDER</button>
        </div>
      </div>
    </form>
</div>
</div>
    