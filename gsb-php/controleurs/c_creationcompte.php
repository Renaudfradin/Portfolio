<?php
include("vues/v_sommaire_admin.php");
$action = $_REQUEST['action'];
switch ($action) {
    case 'info' :{
        $inf = $pdo->getInfosVisiteur1();
    }
    case 'creecompte' :{
        include("vues/v_creationcompte.php");
        if (isset($_REQUEST['newid']) AND !empty($_REQUEST['newid']) AND isset($_REQUEST['newnom']) AND !empty($_REQUEST['newnom']) 
        AND isset($_REQUEST['newprenom']) AND !empty($_REQUEST['newprenom']) AND isset($_REQUEST['newlogin']) AND !empty($_REQUEST['newlogin']) 
        AND isset($_REQUEST['newmdp1']) AND !empty($_REQUEST['newmdp1']) AND isset($_REQUEST['newadresse']) AND !empty($_REQUEST['newadresse']) 
        AND isset($_REQUEST['newcp']) AND !empty($_REQUEST['newcp']) AND isset($_REQUEST['newville']) AND !empty($_REQUEST['newville']) 
        AND isset($_REQUEST['newdate']) AND !empty($_REQUEST['newdate']) AND isset($_REQUEST['newstatue']) AND !empty($_REQUEST['newstatue'])) {
            $id = $_REQUEST["newid"];
            $nom = $_REQUEST["newnom"];
            $prenom = $_REQUEST["newprenom"];
            $login = $_REQUEST["newlogin"];
            $mdp = $_REQUEST["newmdp1"];
            $adresse = $_REQUEST["newadresse"];
            $cp = $_REQUEST["newcp"];
            $ville = $_REQUEST["newville"];
            $date = $_REQUEST["newdate"];
            $statu = $_REQUEST["newstatue"];
            $modifcompte = $pdo->createcompte($id,$nom,$prenom,$login,$mdp,$adresse,$cp,$ville,$date,$statu);
            var_dump($modifcompte);
            //header("Location:index.php?uc=voirutilisateur&action=voircompte");
        }else{
            echo "info manquante";
        }
    } 

}

?>
$_REQUEST['newid'] != $inf['id']


