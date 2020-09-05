<div class = "block">
<div class = "container"> 

  <div class="field is-grouped is-grouped-centered">
    <h2 class = "title is-2">Descriptif des éléments hors forfait</h2>
  </div>        
  <div class="field is-grouped is-grouped-centered">
    <h3 class = "title is-3">Nouvel élément hors forfait</h3>
  </div> 
  <form method="POST" action="index.php?uc=gererFrais&action=validerCreationFrais">
          <div class="field  is-grouped is-grouped-centered">
            <label class="label">Date (jj/mm/aaaa) </label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="DATE" name="dateFrais" id = "" value = "">
          </div>
          <br>
          <div class="field  is-grouped is-grouped-centered">
            <label class="label">Libellé </label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="LIBELLE" name="libelle" id = "" value = "">
          </div>
          <br>
          <div class="field  is-grouped is-grouped-centered">
            <label class="label">Montant </label>
          </div>
          <div class="control">
            <input class="input" type="text" placeholder="MONTANT" name="montant" id = "" value = "">
          </div>
          <br>
          <div class="field is-grouped is-grouped-centered">
            <div class="control">
              <button class="button is-black" name="">VALIDER</button>
            </div>
          </div>
  </form>
</div>
</div>