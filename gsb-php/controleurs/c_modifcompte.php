<?php
include("vues/v_sommaire_admin.php");
$action = $_REQUEST['action'];
var_dump($action);

$id = $_REQUEST['id'];
        var_dump($id);
        $inf = $pdo->getinfos($id);
        var_dump($inf);
        
           
        $id1 = $_REQUEST['id'];  
        $nom1 = $_REQUEST['nom'];  
        $prenom1 = $_REQUEST['prenom'];  
        $login1 = $_REQUEST['login'];  
        $adresse1 = $_REQUEST['adresse'];  
        $cp1 = $_REQUEST['cp'];  
        $ville1 = $_REQUEST['ville'];  
        $datembauche1 = $_REQUEST['dateEmbauche'];  
        $statu1 = $_REQUEST['statuid'];  
        $modif = $pdo->updateinfocompte($id1,$nom1,$prenom1,$login1,$adresse1,$cp1,$ville1,$datembauche1,$statu1,$id);
        
    
    
    var_dump($modif);
        

        
        include("vues/v_modifcompte.php");