<?php
  require_once("connexiondb.php");

if (isset($_POST['forminscription']) ) {
  if (!empty($_POST['pseudo'])AND !empty($_POST['age']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']))
  {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $age = htmlspecialchars($_POST['age']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST["mdp"]);
    $mdp2 = sha1($_POST["mdp2"]);

    $pseudolength = strlen($pseudo);
    if ($pseudolength <= 255) {
      if ($mail == $mail2 ) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
          $reqmail = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
          $reqmail ->execute(array($mail));
          $mailexist = $reqmail->rowCount();
          if ($mail == $mailexist) {


            if ($mdp  == $mdp2) {

              $longeurkey = 15;
              $key= "";
              for ($i=1; $i<$longeurkey ; $i++) { 
                $key .= mt_rand(0,9);
              }


              $insertmbr = $bdd->prepare("INSERT INTO user (pseudo,age,mdp,mail,confirmkey) VALUES (?, ?, ?, ?, ?)");
              $insertmbr ->execute(array($pseudo, $age, $mdp, $mail, $key));
              $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";

          
          $header="MIME-Version: 1.0\r\n";
          $header.='From:"ciel de paris "<renaud2fradin@gmail.com>'."\n";
          $header.='Content-Type:text/html; charset="uft-8"'."\n";
          $header.='Content-Transfer-Encoding: 8bit';
          
          
          $message='
          <html>
            <body>
              <div alig="center">
              <p>Bonjour</p>
              <p>Bievenue sur mon site  cliquer sur le lien en dessou pour confirmer ton iscription</p>
              <p>xDDDDDDDDDD</p>
              <a href ="http://localhost/courphp/confirmation.php?pseudo='.urlencode($pseudo).'&key='.$key.'">Confirmer votre compte</a>
              </div>
            </body>
          </html>
          ';
          
          mail("$mail", "Confirmation de mail", $message,$header);
          
          
        }
        else {
          $erreur = "les 2 mot de passe ne sont pa correspondant <br>";
        }

        }
        else{
        $erreur = "Adresse mail déjà utilisée !";
        }

       }
       else {
         $erreur = "votre adresse mail n estr pa valid";
       }
      }
      else {
        $erreur = "les 2 mail ne sont pa correspondant";
      }


    }
    else {
      $erreur = "votre pseudo est trop grand";
    }
  }
  else {
      $erreur = "se pa bon pseudo manquand ";
  }
}
?>
<html>
<head>
  <title>THE BD SHOP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../main.css">
  
  <?php
  require_once("boostrap-inc.php");
  ?>
  
</head>
<body>

<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../accueille.php">The BD SHOP</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="BD.php">Nos BD</a></li>
      <li><a href="#">Nous trouver</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="../magasin/magasin.html"><span class="glyphicon glyphicon-shopping-cart"></span>Magasin</a></li>
      <?php
					if (!isset($_SESSION["id"])) {
						echo "<li><a href='connexion.php'><span class='glyphicon glyphicon-user'></span>Connexion</a></li>";
					}else{
            $getid1 = intval($_GET["id"]);
            $p = $bdd->prepare("SELECT * FROM user WHERE id = ?");
            $p->execute(array($getid1));
            $p1 = $p->fetch();
            ?>
			      <li><a href='profil.php?id=<?=$_SESSION['id'] ?>'><span class='glyphicon glyphicon-user'></span><?=$p1['pseudo'] ?></a></li>";
              <?php
          }  ?>
      <li><a href="page-incription.php"><span class="glyphicon glyphicon-log-in"></span>inscription</a></li>
    </ul>
   
  </div>
</nav>

<div class="row">
    <div class="col-sm-3">
        <ul>

        </ul>    
    </div>
</div>


<div class="container" id="main-content">
    <div class="col-sm-9">

    <div align="center">
  <h1>INSCRIPTION</h1>
  <br>
  <br>
  
        
            

  <form method="POST"action="">
    <table>
    <tr>
      <td>
        <label for="pseudo">Pseudo :</label>
      </td>
      <td>
        <input type="text" name="pseudo" id="pseudo" placeholder="votre pseudo" required>
      </td>
    </tr>

    <tr>
      <td>
        <label for="age">Age :</label>
      </td>
      <td>
        <input type="text" name="age" id="age" placeholder="votre age" required>
      </td>
    </tr>

    <tr>
      <td>
        <label for="mdp">Mot-de-passe :</label>
      </td>
      <td>
        <input type="password" name="mdp" id="mdp" placeholder="votre mot-de-passe" required>
      </td>
    </tr>

    <tr>
      <td>
        <label for="mdp2">Confimer votre Mot-de-passe :</label>
      </td>
      <td>
        <input type="password" name="mdp2" id="mdp2" placeholder="confirmer votre mot-de-passe" required>
      </td>
    </tr>

    <tr>
      <td>
        <label for="mail">Mail :</label>
      </td>
      <td>
        <input type="email" name="mail" id="mail" placeholder="votre mail" required>
      </td>
    </tr>

    <tr>
      <td>
        <label for="mail2">Confirmer votre Mail :</label>
      </td>
      <td>
        <input type="email" name="mail2" id="mail2" placeholder="confirmer votre mail" required>
      </td>
    </tr>

  </table>
  <br>
  <button type="submit" name="forminscription">Envoyer</button>

    </form>
    <a href="index.php"><button>Deja inscrit?</button></a>
    <br>
    <br>

  <?php
  if (isset($erreur)) {
    echo $erreur;
  }
  ?>
    </div>




    </div>
</div>


</body>
</html>