<?php
$statue = $_SESSION["statu-id"];
if ($statue == "visiteur") {
    include("vues/v_sommaire_visiteur.php");
} elseif ($statue == "administrateur") {
    include("vues/v_sommaire_admin.php");
} elseif ($statue == "comptable") {
    include("vues/v_sommaire_contable.php");
}
$action = $_REQUEST['action'];
$uc = $_REQUEST['uc'];
switch ($action) {
    case 'profile':{
        $id = $_SESSION['idVisiteur'];
        $lesinfosvisi=$pdo->getinfos($id);
        include("vues/v_profil.php");
        break;
    }
    case 'modifcomptevisiteur':{   
        $id = $_SESSION['idVisiteur'];
        $lesinfosvisi=$pdo->getinfos($id);
        if (isset($_REQUEST['nom1']) AND !empty($_REQUEST['nom1']) AND $_REQUEST['nom1'] != $lesinfosvisi['nom']) {
            $nom1 = $_REQUEST['nom1'];   
            $modif = $pdo->updatecomptevisiteurnom($nom1,$id);
            header("Location:index.php?uc=profil&action=profile");
        } 
        if (isset($_REQUEST['prenom1']) AND !empty($_REQUEST['prenom1']) AND $_REQUEST['prenom1'] != $lesinfosvisi['prenom']) {
            $prenom1 = $_REQUEST['prenom1'];  
            $modif = $pdo->updatecomptevisiteurprenom($prenom1,$id);
            header("Location:index.php?uc=profil&action=profile");
        } 
        if (isset($_REQUEST['adresse1']) AND !empty($_REQUEST['adresse1']) AND $_REQUEST['adresse1'] != $lesinfosvisi['adresse']) {
            $adresse1 = $_REQUEST['adresse1'];  
            $modif = $pdo->updatecomptevisiteurpreadresse($adresse1,$id);
            header("Location:index.php?uc=profil&action=profile");
        }
        if (isset($_REQUEST['cp1']) AND !empty($_REQUEST['cp1']) AND $_REQUEST['cp1'] != $lesinfosvisi['cp']) {
            $cp1 = $_REQUEST['cp1'];  
            $modif = $pdo->updatecomptevisiteurprecp($cp1,$id);
            header("Location:index.php?uc=profil&action=profile");
        }
        if (isset($_REQUEST['ville1']) AND !empty($_REQUEST['ville1']) AND $_REQUEST['ville1'] != $lesinfosvisi['ville']) {
            $ville1 = $_REQUEST['ville1']; 
            $modif = $pdo->updatecomptevisiteurpreville($ville1,$id);
            header("Location:index.php?uc=profil&action=profile");
        }
        if (isset($_REQUEST['mdp1']) AND !empty($_REQUEST['mdp1'])) {
            if($_REQUEST['mdp1'] == $_REQUEST['mdp2']){
                $mdp1 = $_REQUEST['mdp1'];
                $mdp2 = $_REQUEST['mdp2'];
                $modifmdp = $pdo->updatemdp($mdp1,$id);
                header("Location:index.php?uc=profil&action=profile");
            }
        }
        include("vues/v_modifcomptevisiteur.php");
        break;
    }
include("vues/v_profil.php");
break;
} 


