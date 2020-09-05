<div class = "block">
  <div class = "container"> 
    <div class="field is-grouped is-grouped-centered">
        <h3 class = "title is-3">Fiche de frais du : <?= $numMois."-".$numAnnee?></h3>
    </div>
    <div class="field is-grouped is-grouped-centered">
      <h5 class = "title is-5">Etat : <?= $libEtat?> depuis le <?= $dateModif?> <br> Montant validé : <?= $montantValide?></h5>
    </div>
      <div class = "columns">
        <div class = "column">
          <div class="field is-grouped is-grouped-centered">
            <h5 class = "title is-5">Eléments forfaitisés</h5>
          </div>
          <table class = "table is-bordered" id = "tableauetatforfais">
            <thead>
              <tr>
                <?php
                foreach ( $lesFraisForfait as $unFraisForfait){
                $libelle = $unFraisForfait['libelle'];?>	
                <th><?= $libelle?></th>
                <?php } ?>
              </tr>
              <tr>
                <?php
                foreach (  $lesFraisForfait as $unFraisForfait){
                $quantite = $unFraisForfait['quantite'];?>
                <td><?= $quantite?> </td>
                <?php } ?>
              </tr>
            </thead>
          </table>
        </div>
        <div class = "column">
          <div class="field is-grouped is-grouped-centered">
            <h5 class = "title is-5">Descriptif des éléments hors forfait -<?= $nbJustificatifs?> justificatifs reçus</h5>
          </div>
          <table class = "table is-bordered" id = "tableauetatforfais">
            <thead>
              <tr>
                <th>Date</th>
                <th>Libellé</th>
                <th>Montant</th>                
              </tr>
              <?php      
                foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) {
                $date = $unFraisHorsForfait['date'];
                $libelle = $unFraisHorsForfait['libelle'];
                $montant = $unFraisHorsForfait['montant'];?>
              <tr>
                <td><?= $date ?></td>
                <td><?= $libelle ?></td>
                <td><?= $montant ?></td>
              </tr>
              <?php } ?>
            </thead>
          </table>        
        </div>
      </div>   
  </div>
</div>












