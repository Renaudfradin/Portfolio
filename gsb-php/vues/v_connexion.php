<div class = "blockimg">
    <img src="./images/logo.jpg" alt="" srcset="">
</div>
<div class = "block" id = "blocklog">
      <div class="field  is-grouped is-grouped-centered">
            <h2 class="title is-2">Identification utilisateur</h2>
      </div>
<form method="POST" action="index.php?uc=connexion&action=valideConnexion">

      <div class = "container">
            <div class="field  is-grouped is-grouped-centered">
                  <label class="label">INDENTIFIANT </label>
            </div>
            <div class="control">
                  <input class="input" type="text" placeholder="INDENTIFIANT" name = "login" id = "login1">
            </div>
            <br>
            <div class="field  is-grouped is-grouped-centered">
                  <label class="label">MOT DE PASSE </label>
            </div>
            <div class="control">
                  <input class="input" type="password" placeholder="MOT DE PASSE" name = "mdp" id = "mdp1">
            </div>
            <br>
            <div class="field is-grouped is-grouped-centered">
                  <div class="control">
                        <button class="button is-black" name="valider">CONNEXION</button>
                  </div>
            </div>
            <br>
            <br>
      </div>   
</form>
</div>

