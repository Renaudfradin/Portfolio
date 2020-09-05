<?php
include("vues/v_sommaire_admin.php");
$action = $_REQUEST['action'];
switch ($action) {
    case 'voircompte':{
        $lesinfosvisi=$pdo->getInfosVisiteur1();
        include("vues/v_voirutilisateur.php");
        break;
    }
    case 'modifcompte' :{/*header("Location:index.php?uc=voirutilisateur&action=voircompte");*/
        $id = $_REQUEST['id'];
        $inf = $pdo->getinfos($id);
        
        if (isset($_REQUEST['id']) AND !empty($_REQUEST['id']) AND $_REQUEST['id'] != $inf['id']) {
            $idmodif = $_REQUEST['id']; 
            $modif = $pdo->updatecomptevisiteurid($idmodif,$id);
            header("Location:index.php?uc=voirutilisateur&action=voircompte");
        } 
        if (isset($_REQUEST['nom']) AND !empty($_REQUEST['nom'])) {
            $nom = $_REQUEST['nom'];  
            $modif = $pdo->updatecomptevisiteurnom1($nom,$id);
            header("Location:index.php?uc=voirutilisateur&action=voircompte");
        } 
        if (isset($_REQUEST['prenom']) AND !empty($_REQUEST['prenom'])) {
            $prenom = $_REQUEST['prenom'];  
            $modif = $pdo->updatecomptevisiteurprenom1($prenom,$id);
            header("Location:index.php?uc=voirutilisateur&action=voircompte");
        }
        if (isset($_REQUEST['login']) AND !empty($_REQUEST['login'])) {
            $login = $_REQUEST['login'];  
            $modif = $pdo->updatecomptevisiteurlogin($login,$id);
            header("Location:index.php?uc=voirutilisateur&action=voircompte");
        }
        if (isset($_REQUEST['adresse']) AND !empty($_REQUEST['adresse'])) {
            $adresse = $_REQUEST['adresse'];  
            $modif = $pdo->updatecomptevisiteuradresse($adresse,$id);
            header("Location:index.php?uc=voirutilisateur&action=voircompte");
        }
        if (isset($_REQUEST['cp']) AND !empty($_REQUEST['cp'])) {
            $cp = $_REQUEST['cp'];  
            $modif = $pdo->updatecomptevisiteurcp($cp,$id);
            header("Location:index.php?uc=voirutilisateur&action=voircompte");
        }
        if (isset($_REQUEST['ville']) AND !empty($_REQUEST['ville'])) {
            $ville = $_REQUEST['ville']; 
            $modif = $pdo->updatecomptevisiteurville($ville,$id);
            header("Location:index.php?uc=voirutilisateur&action=voircompte");
        }
        if (isset($_REQUEST['datembauche']) AND !empty($_REQUEST['datembauche'])) {
            $datembauche = $_REQUEST['datembauche']; 
            $modif = $pdo->updatecomptevisiteurdate($datembauche,$id);
            header("Location:index.php?uc=voirutilisateur&action=voircompte");
        }
        if (isset($_REQUEST['statu']) AND !empty($_REQUEST['statu'])) {
            $statu = $_REQUEST['statu']; 
            $modif = $pdo->updatecomptevisiteurstatu($statu,$id);
            header("Location:index.php?uc=voirutilisateur&action=voircompte");
        }
        if (isset($_REQUEST['newmdp1']) AND !empty($_REQUEST['newmdp1'])) {
            if($_REQUEST['newmdp1'] == $_REQUEST['newmdp2']){
                $mdp1 = $_REQUEST['newmdp1'];
                $mdp2 = $_REQUEST['newmdp2'];
                $modifmdp = $pdo->updatecomptevisiteurmdp($mdp1,$id);
                header("Location:index.php?uc=voirutilisateur&action=voircompte");
            }
        }
    include("vues/v_modifcompte.php");
    break;
    }
    case 'suprimmercompte':{
        $id = $_REQUEST['id'];
        var_dump($id);
        if (isset($id)){
            $exex = $pdo->deltevisiteur($id);
            var_dump($exex);
        }
        include("vues/v_deletevisiteur.php");
        break;
    }
include("vues/v_voirutilisateur.php");
break;
}

?>