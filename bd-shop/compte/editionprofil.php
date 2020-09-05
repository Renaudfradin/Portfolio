 <?php
require_once("connexiondb.php");

//include_once("cookiconnect.php");



if (isset($_SESSION["id"])){

  $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
  $requser->execute(array($_SESSION["id"]));
  $user = $requser->fetch();

  if (isset($_POST["newpseudo"]) AND !empty($_POST["newpseudo"]) AND $_POST["newpseudo"] != $user["pseudo"]) {

    $newpseudo = htmlspecialchars($_POST["newpseudo"]);
    $insertpseudo = $bdd->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
    $insertpseudo->execute(array($newpseudo, $_SESSION["id"]));
    header("Location: profil.php?id=".$_SESSION["id"]);
  }
  if (isset($_POST["newprenom"]) AND !empty($_POST["newprenom"]) AND $_POST["newprenom"] != $user["prenom"]) {
    $newage = htmlspecialchars($_POST["newprenom"]);
    $insertage = $bdd->prepare("UPDATE user SET prenom = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: profil.php?id=".$_SESSION["id"]);
  }
  if (isset($_POST["newprenom"]) AND !empty($_POST["newcivilite"]) AND $_POST["newcivilite"] != $user["civilite"]) {
    $newage = htmlspecialchars($_POST["newcivilite"]);
    $insertage = $bdd->prepare("UPDATE user SET civilite = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: profil.php?id=".$_SESSION["id"]);
  }
  if (isset($_POST["newnom"]) AND !empty($_POST["newnom"]) AND $_POST["newnom"] != $user["nom"]) {
    $newage = htmlspecialchars($_POST["newnom"]);
    $insertage = $bdd->prepare("UPDATE user SET nom = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: profil.php?id=".$_SESSION["id"]);
  }
  if (isset($_POST["newage"]) AND !empty($_POST["newage"]) AND $_POST["newage"] != $user["age"]) {
    $newage = htmlspecialchars($_POST["newage"]);
    $insertage = $bdd->prepare("UPDATE user SET age = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: profil.php?id=".$_SESSION["id"]);
  }
  if (isset($_POST["newpays"]) AND !empty($_POST["newpays"]) AND $_POST["newpays"] != $user["pays"]) {
    $newage = htmlspecialchars($_POST["newpays"]);
    $insertage = $bdd->prepare("UPDATE user SET pays = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: profil.php?id=".$_SESSION["id"]);
  }
  if (isset($_POST["newdatedenaissance"]) AND !empty($_POST["newdatedenaissance"]) AND $_POST["newdatedenaissance"] != $user["datedenaissance"]) {
    $newage = htmlspecialchars($_POST["newdatedenaissance"]);
    $insertage = $bdd->prepare("UPDATE user SET datedenaissance = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: profil.php?id=".$_SESSION["id"]);
  }
  if (isset($_POST["newpostal"]) AND !empty($_POST["newpostal"]) AND $_POST["newpostal"] != $user["postal"]) {
    $newage = htmlspecialchars($_POST["newpostal"]);
    $insertage = $bdd->prepare("UPDATE user SET postal = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: profil.php?id=".$_SESSION["id"]);
  }
  if (isset($_POST["newville"]) AND !empty($_POST["newville"]) AND $_POST["newville"] != $user["ville"]) {
    $newage = htmlspecialchars($_POST["newville"]);
    $insertage = $bdd->prepare("UPDATE user SET ville = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: profil.php?id=".$_SESSION["id"]);
  }
  if (isset($_POST["newadresse"]) AND !empty($_POST["newadresse"]) AND $_POST["newadresse"] != $user["adresse"]) {
    $newage = htmlspecialchars($_POST["newadresse"]);
    $insertage = $bdd->prepare("UPDATE user SET adresse = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: profil.php?id=".$_SESSION["id"]);
  }
  if (isset($_POST["newphone"]) AND !empty($_POST["newphone"]) AND $_POST["newphone"] != $user["phone"]) {
    $newage = htmlspecialchars($_POST["newphone"]);
    $insertage = $bdd->prepare("UPDATE user SET phone = ? WHERE id = ?");
    $insertage->execute(array($newage, $_SESSION["id"]));
    header("Location: profil.php?id=".$_SESSION["id"]);
  }
  

  if(isset($_POST["newmdp"]) AND !empty($_POST["newmdp"]) AND isset($_POST["newmdp2"]) AND !empty($_POST["newmdp2"])) {
    $mdp1 = sha1($_POST["newmdp"]);
    $mdp2 = sha1($_POST["newmdp2"]);
    if($mdp1 == $mdp2) {
       $insertmdp = $bdd->prepare("UPDATE user SET mdp = ? WHERE id = ?");
       $insertmdp->execute(array($mdp1, $_SESSION['id']));
       header('Location: profil.php?id='.$_SESSION['id']);
    }
    else {
       $msg = "Vos deux mdp ne correspondent pas !";
    }
  }

  if(isset($_POST["newmail"]) AND !empty($_POST["newmail"]) AND isset($_POST["newmail2"]) AND !empty($_POST["newmail2"])) {
    $mail1 = $_POST["newmail"];
    $mail2 = $_POST["newmail2"];
    if($mail1 == $mail2) {
       $insertmail = $bdd->prepare("UPDATE user SET mail = ? WHERE id = ?");
       $insertmail->execute(array($mail1, $_SESSION['id']));
       header('Location: profil.php?id='.$_SESSION['id']);
    }
    else {
       $msg = "Vos deux mail ne correspondent pas !";
    }
  }

  if (isset($_FILES["avatar"]) AND !empty($_FILES["avatar"]["name"])) {
    //la on deffini la taille en octet
    //la on a mi une taille de 15MO
      $tailleMax =  15097152;
      $extensionValides = array("jpg","jpeg","gif","png" );
      if ($_FILES["avatar"]["size"] <= $tailleMax) {
          //le strchr va nous permettre de renvoyer l extension de avatar avec le point
          //le substr va nous permmetre d ignore le 1er carractere de la chaine car on a mis "1"
          //le strtolower va nous permmetre de tous mettre en minuscule pour etre sur que tous est minucule pour pa qu il y est un beug
         $extensionUpload = strtolower(substr(strchr($_FILES["avatar"]["name"],"."),1));
         if (in_array($extensionUpload, $extensionValides)) {
           $chemin = "membres/avatars/".$_FILES["avatar"]["name"].".".$extensionUpload;
           $resultat = move_uploaded_file($_FILES["avatar"]["tmp_name"],$chemin);
           if ($resultat) {
             $updateavatar =$bdd->prepare("UPDATE user SET avatar = :avatar WHERE id = :id ");
             $updateavatar->execute(array(
                  "avatar" => $_FILES["avatar"]["name"],
                  "id" => $_SESSION["id"]
            ));
            header('Location: profil.php?id='.$_SESSION['id']);
           }
           else {
             $msg = "Erreur durant l inportation de la photo";
           }
         }
         else {
          $msg = "votre photo de profil doit etre au format jpg, jpeg, gif ou png";
         }
      }
      else {
        $msg = "votre photo de profil ne doit pa depasser 2MO !";
      }
  }

/*//
  for ($i=0; $i < 1000000000000000000; $i++) { 
    echo $i,$msg ="nul mitroglou",$i,$i,$msg ="nul mitroglou"."<br>";
  }
  */
// ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            $getid1 = intval($_SESSION["id"]);
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
<h1>Edition de mon profil</h1>
  <br>
  <br>
                          <!-- type d encodage   se pour les l uplode de fichier -->
  <form method="POST"action="" enctype="multipart/form-data" class="tooutlestable">
  <table class="table1">

  <tr>
    <td>
  <label for="newcivilite">Civilité :</label>
    </td>
    <br>
    <td>
            <select name="newcivilite">
                <option value="    ">   </option>
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>
            </select>
    </td>
  </tr>
  
  <tr>
    <td>
      <label for="newpseudo">Pseudo :</label>
    </td>
    <td>
      <input type="text" name="newpseudo" id="newpseudo" placeholder="votre new pseudo"value="<?php echo $user["pseudo"]; ?>"> <br /><br />
    </td>
  </tr>

  <tr>
    <td>
      <label for="newprenom">Prenom :</label>
    </td>
    <td>
      <input type="text" name="newprenom" id="newprenom" placeholder="Votre prenom"value="<?php echo $user["prenom"]; ?>"> <br /><br />
    </td>
  </tr>

  <tr>
    <td>
      <label for="newnom">Nom :</label>
    </td>
    <td>
      <input type="text" name="newnom" id="newnom" placeholder="Votre nom"value="<?php echo $user["nom"]; ?>"> <br/><br />
    </td>
  </tr>


  <tr>
    <td>
  <label for="newage">Age :</label>
    </td>
    <td>
            <select name="newage">
                <option value="   ">      </option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="56">56</option>
                <option value="57">57</option>
                <option value="58">58</option>
                <option value="59">59</option>
                <option value="60">60</option>
                <option value="61">61</option>
                <option value="62">62</option>
                <option value="63">63</option>
                <option value="64">64</option>
                <option value="65">65</option>
                <option value="66">66</option>
                <option value="67">67</option>
                <option value="68">68</option>
                <option value="69">69</option>
                <option value="70">70</option>
                <option value="71">71</option>
                <option value="72">72</option>
                <option value="73">73</option>
                <option value="74">74</option>
                <option value="75">75</option>
                <option value="76">76</option>
                <option value="77">77</option>
                <option value="78">78</option>
                <option value="79">79</option>
                <option value="80">80</option>
                <option value="81">81</option>
                <option value="82">82</option>
                <option value="83">83</option>
                <option value="84">84</option>
                <option value="85">85</option>
                <option value="86">86</option>
                <option value="87">87</option>
                <option value="88">88</option>
                <option value="89">89</option>
                <option value="90">90</option>
                <option value="91">91</option>
                <option value="92">92</option>
                <option value="93">93</option>
                <option value="94">94</option>
                <option value="95">95</option>
                <option value="96">96</option>
                <option value="97">97</option>
                <option value="98">98</option>
                <option value="99">99</option>
                <option value="100">100</option>
            </select>
    </td>
  </tr>

  <tr>
    <td>
      <label for="newmdp">Mot-de-passe :</label>
    </td>
    <td>
      <input type="password" name="newmdp" id="newmdp" placeholder="votre new mot-de-passe" ><br /><br />
    </td>
  </tr>

  <tr>
    <td>
      <label for="newmdp2">Confimer votre Mot-de-passe :</label>
    </td>
    <td>
      <input type="password" name="newmdp2" id="newmdp2" placeholder="confirmer votre new mot-de-passe" ><br /><br />
    </td>
  </tr>

  <tr>
    <td>
      <label for="newmail">Mail :</label>
    </td>
    <td>
      <input type="email" name="newmail" id="newmail" placeholder="votre new mail"value="<?php echo $user["mail"]; ?>" > <br /><br />
    </td>
  </tr>

        </table>

        <table class="table2">

  <tr>
    <td>
      <label for="newmail2">Confirmer votre Mail :</label>
    </td>
    <td>
      <input type="email" name="newmail2" id="newmail2" placeholder="exemple@qqq.com"><br /><br />
    </td>
  </tr>

  <tr>
    <td>
      <label for="newadresse">Adresse :</label>
    </td>
    <td>
      <input type="text" name="newadresse" id="newadresse" placeholder="votre adresse"value="<?php echo $user["adresse"]; ?>"><br /><br />
    </td>
  </tr>



  <tr>
    <td>
      <label for="newpostal">Code postal :</label>
    </td>
    <td>
      <input type="text" name="newpostal" id="newpostal" placeholder="code postal"value="<?php echo $user["postal"]; ?>"> <br/><br />
    </td>
  </tr>

  <tr>
    <td>
      <label for="newville">Ville :</label>
    </td>
    <td>
      <input type="text" name="newville" id="newville" placeholder="ville" value="<?php echo $user["ville"]; ?>"> <br/><br />
    </td>
  </tr>

  <tr>
    <td>
  <label for="newpays">Pays :</label>
    </td>
    <td>
            <select name="newpays">
                <option value="France">France</option>
                <option value="Belgique">Belgique</option>
                <option value="Canada">Canada</option>
                <option value="Maroc">Maroc</option>
                <option value="Tunisie">Tunisie</option>
                <option value="Algerie">Algerie</option>
                <option value="Togo">Togo</option>
                <option value="Rwanda">Rwanda</option>
            </select>
    </td>
  </tr>

  <tr>
    <td>
      <label for="newphone">N° telephone:</label>
    </td>
    <td>
      <input type="text" name="newphone" id="newphone" placeholder=" votre N° telephone"value="<?php echo $user["phone"]; ?>"> <br/><br />
    </td>
  </tr>

  <tr>
    <td>
      <label for="newdatedenaissance	">Date de naissance:</label>
    </td>
    <td>
      <input type="text" name="newdatedenaissance" id="newdatedenaissance	" placeholder="jj/mm/aaaa"value="<?php echo $user["datedenaissance"]; ?>"> <br/><br />
    </td>
  </tr>

  <tr>
    <td>
      <label for="avatar">Avatar :</label>
    </td>
    <td>
      <!-- le type file permet de d aller choisir un dossier dans l ordinateur -->
      <input type="file" name="avatar" id="avatar"><br /><br />
    </td>
  </tr>
</table> 
<br>
 
<a href=""><button class="btnupdate" type="submit" name="forminscription">Mettre a jour le profil</button></a>
</form>
<br>
<a href='profil.php?id=<?=$_SESSION["id"] ?>'><button class="btnprofil">Profil</button></a>  





 
  <?php if(isset($msg)) { echo $msg; } ?>

</body>
</html>

<?php
}
else {
  header("Location: connexion.php");
}
?>
