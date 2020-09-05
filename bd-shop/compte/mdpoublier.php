<?php

session_start();

require_once("connexiondbinc2.php");

if (isset($_GET["section"])) {
    $section = htmlspecialchars($_GET["section"]);
}
else{
        $section = "";
}

if (isset($_POST["recup_submit"],$_POST["recup_mail"])) {
    if (!empty($_POST["recup_mail"])) {
        $recup_mail= htmlspecialchars($_POST["recup_mail"]);
        //filter va verifier si l adressee mail est valide 
        if (filter_var($recup_mail,FILTER_VALIDATE_EMAIL)) {
            echo "ssssssssssssssssss";
            $mailexist = $bdd->prepare('SELECT id,pseudo FROM user WHERE mail = ?');
            $mailexist->execute(array($recup_mail));
            $mailexist_count = $mailexist->rowCount();
            if ($mailexist_count == 1) {
                echo "se bon adrressse trouver";
                $pseudo = $mailexist->fetch();
                $pseudo = $pseudo["pseudo"];
                var_dump($pseudo );

                $_SESSION["recup_mail"] = $recup_mail;
                $recup_code = "";
                for ($i=0; $i < 8 ; $i++) { 
                    $recup_code .= mt_rand(0,9);
                }
                $mail_recup_existe = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ?');
                $mail_recup_existe->execute(array($recup_mail));
                $mail_recup_existe = $mail_recup_existe->rowCount();

                if ($mail_recup_existe == 1) {
                    $recup_insert = $bdd->prepare("UPDATE recuperation SET code = ? WHERE mail = ?");
                    $recup_insert->execute(array($recup_code,$recup_mail));
                }else {
                    $recup_insert = $bdd->prepare("INSERT INTO recuperation(mail,code) VALUE (?, ?)");
                    $recup_insert->execute(array($recup_mail,$recup_code));
                }



                $header="MIME-Version: 1.0\r\n";
                $header.='From:<support@cieldeparis.com>'."\r\n";
                $header.='Content-Type:text/html; charset="uft-8"'."\r\n";
                $header.='Content-Transfer-Encoding: 8bit';
                $message = '
                <html>
                <head>
                <title>Récupération de mot de passe</title>
                <meta charset="utf-8" /> 
                </head>
                <body>
                <font color="#303030";>
                    <div align="center">
                    <table width="600px">
                        <tr>
                        <td>
                            <img src="http://www.cieldeparis.com/themes/default/images/logo/logo_1000x207.png" alt=""><br>
                            <div align="center">Bonjour <b>'.$pseudo.'</b><br>
                            Voicie votre code de recuperation <b>'.$recup_code.'</b> pour pouvoir acceder a votre compte.<br>
                            A bientôt sur sur le site du <a href="#">ciel de paris </a> !<br>
                            Nous esperons vous voir dans notre restaurant<br></div>
                            
                        </td>
                        </tr>
                        <tr>
                        <td align="center">
                            <font size="2">
                            Ceci est un email automatique, merci de ne pas y répondre
                            </font>
                        </td>
                        </tr>
                    </table>
                    </div>
                </font>
                </body>
                </html>
                ';

                mail("$recup_mail","changement de mot de passe", $message,$header);
                header("Location:http://localhost/courphp/mdpoublier.php?section=code");

            }
            else {
                $erreur = "cette adressse n est pas reconue";
            }
        }
        else{
            $erreur = "L' adressse mail est incorecte"; 
        } 
    }
    else {
        $erreur = "veuiller entre votre adresse mail svp";
    }
}



if (isset($_POST["verif_code"],$_POST["verif_code"])) {
    if (!empty($_POST["verif_code"])) {
        $verif_code = htmlspecialchars($_POST["verif_code"]);
        $verif_req = $bdd->prepare("SELECT id FROM recuperation WHERE mail = ? AND code = ?");
        $verif_req->execute(array($_SESSION["recup_mail"],$verif_code));
        $verif_req = $verif_req->rowCount();
        if ($verif_req == 1) {
            $del_req = $bdd->prepare("DELETE FROM recuperation WHERE mail = ?");
            $del_req->execute(array($_SESSION["recup_mail"]));
            header("Location:http://localhost/courphp/mdpoublier.php?section=changmdp");

        }else{
            $erreur = "code incorecte";
        }

    }
    else {
        $erreur = "veuiller entre le code svp";
    }
}
 

if (isset($_POST["change_submit"])) {
    if (isset($_POST["change_mdp"],$_POST["change_mdpc"])) {
        $mdp = htmlspecialchars($_POST["change_mdp"]);
        $mdpc = htmlspecialchars($_POST["change_mdpc"]);
        if (!empty($mdp) AND !empty($mdpc)) {
            if ($mdp == $mdpc) {
                $mdp = sha1($mdp);
                $ins_mdp = $bdd->prepare("UPDATE formulaires SET mdp = ? WHERE mail  = ? ");
                $ins_mdp->execute(array($mdp,$_SESSION["recup_mail"]));
                header("Location:http://localhost/courphp/connexion.php");
                echo  "Votre mot de passse a etait changer avec Succès";

            }else {
                $erreur = "Les deux mot de passse sont differents";
            }
        }
        else {
            $erreur = "Veuiller remplier tput les champs svp";
        }
    }else {
        $erreur = "Veuiller remplier tput les champs svp";
    }
}



?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body> 
    <h1>Recupetion de mot de passe</h1>
    <?php if ($section == "code") {  ?>
    Recuperation de mot de passe pour <?= $_SESSION["recup_mail"] ?>

    <form method="POST" action="">
  <tr>
    <td>
    <input type="text" name="verif_code" id="verif_code" placeholder="code de verification">
	<input type="submit" value="Valider" name="verif_submit"/>
    </td>
  </tr>
  </form>

    <?php } elseif($section == "changmdp"){?>
    Chamgement de mot de passe pour <?= $_SESSION["recup_mail"] ?>
        <form method="POST" action="">
  <tr>
    <td>
    <input type="password" name="change_mdp" id="change_mdp" placeholder="nouveau mot de passe"><br>
    <input type="password" name="change_mdpc" id="change_mdpc" placeholder="confirmation du nouveau mot de passe"><br>
	<input type="submit" value="Valider" name="change_submit"/><br>
    </td>
  </tr>
  </form>

    <?php } else { ?>
<form method="POST" action="">
  <tr>
    <td>
    <input type="email" name="recup_mail" id="recup_mail" placeholder="votre adresse mail ">
	<input type="submit" value="Valider" name="recup_submit"/>
    </td>
  </tr>
  </form>
    <?php } ?>

  <?php
if (isset($erreur)) {
  echo $erreur;
}
?>


</body>
</html>