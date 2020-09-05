<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		if(!is_array($visiteur)){
			include("vues/v_connexion.php");
			$erreurs = "<p class='help is-danger' style='text-align: center; margin-top: 1%;'>Login ou mot de passe incorrect</p>";
			echo $erreurs;
		}
		else{
			$erreurs = "  ";
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			$statuid = $visiteur['statu-id'];
			connecter($id,$nom,$prenom,$statuid);
			if ($statuid == "comptable") {
				include("vues/v_sommaire_contable.php");
				include("vues/v_accueil.php");
			}elseif($statuid == "visiteur"){
				include("vues/v_sommaire_visiteur.php");
				include("vues/v_accueil.php");
			}elseif($statuid == "administrateur"){
				include("vues/v_sommaire_admin.php");
				include("vues/v_accueil.php");
			}
		}
		break;
	}
	case 'deconnexion':{
		include("vues/v_deconnexion.php");
	break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>