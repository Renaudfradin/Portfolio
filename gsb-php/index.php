<?php
require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
include("vues/v_entete.php") ;
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
if(!isset($_REQUEST['uc']) || !$estConnecte){
     $_REQUEST['uc'] = 'connexion';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("controleurs/c_connexion.php");
		break;
	}
	case 'gererFrais' :{
		include("controleurs/c_gererFrais.php");
		break;
	}
	case 'etatFrais' :{
		include("controleurs/c_etatFrais.php");
		break; 
	}
	case 'accueil' :{
		include("controleurs/c_acueille.php");
		break;
	}
	case 'voirutilisateur' :{
		include("controleurs/c_voirutilisateur.php");
		break;
	}
	case 'modifcompte' :{
		include("controleurs/c_voirutilisateur.php");
		break;
	}
	case 'suprimmercompte' : {
		include("controleurs/c_voirutilisateur.php");
	    break;
	}
	case 'profil' : {
		include("controleurs/c_profil.php");
	    break;
	}
	case 'modifcomptevisiteur' :{
		include("controleurs/c_profil.php");
		break;
	}
	case 'mentionlegal' :{
		include("controleurs/c_mentionlegal.php");
		break;
	}
	case 'creationcompte' :{
		include("controleurs/c_creationcompte.php");
		break;
	}
}
include("vues/v_pied.php");
?>

