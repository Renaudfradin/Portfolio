<?php
/** 
 * Classe d'accès aux données. 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=bdsmvc';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}
/**
 * Retourne les informations d'un visiteur
 * @param $login 
 * @param $mdp
 * @return l'id, le nom et le prénom sous la forme d'un tableau associatif 
*/
	public function getInfosVisiteur($login, $mdp){
		$req = PdoGsb::$monPdo->query("SELECT * FROM visiteur WHERE login = '{$login}'");
		$ligne = $req->fetch();
        if (password_verify($mdp, $ligne['mdp'])){	
			$req1 = PdoGsb::$monPdo->query("SELECT * FROM visiteur WHERE login = '{$login}'");
			$ligne2 = $req1->fetch();
			return $ligne2;
        }
	}
	public function getInfosVisiteur1(){
		$req1 = PdoGsb::$monPdo->query("SELECT * FROM visiteur");
		var_dump($req1);
		$ligne1 = $req1->fetchAll();
		$nbLignes = count($ligne1);
		for ($i=0; $i < $nbLignes; $i++) { 
		}
		return $ligne1;
	}
	public function deltevisiteur($id){
		$sql = "DELETE FROM visiteur WHERE id = '{$id}'";
		var_dump($sql);
		$req = PdoGsb::$monPdo->prepare($sql);
		$req->execute(array($id));		
	}
	public function getinfos($id){
		$sql = "SELECT * FROM visiteur WHERE id = '{$id}'";	
		$req11 = PdoGsb::$monPdo->query($sql);
		$ligne2 = $req11->fetch();
		return $ligne2;
	}
	public function updatecomptevisiteurnom($nom1,$id){
		$sql = "UPDATE visiteur SET nom = '{$nom1}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($nom1,$id));
		$sql1 = "UPDATE visiteurcop SET nom = '{$nom1}' WHERE id = '{$id}' ";
		$requpdate1 = PdoGsb::$monPdo->prepare($sql1);
		$requpdate1->execute(array($nom1,$id));
	}
	public function updatecomptevisiteurprenom($prenom1,$id){
		$sql = "UPDATE visiteur SET prenom = '{$prenom1}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($prenom1,$id));
		$sql1 = "UPDATE visiteurcop SET prenom = '{$prenom1}' WHERE id = '{$id}' ";
		$requpdate1 = PdoGsb::$monPdo->prepare($sql1);
		$requpdate1->execute(array($prenom1,$id));
	}
	public function updatecomptevisiteurpreadresse($adresse1,$id){
		$sql = "UPDATE visiteur SET adresse = '{$adresse1}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($adresse1,$id));
		$sql1 = "UPDATE visiteurcop SET adresse = '{$adresse1}' WHERE id = '{$id}' ";
		$requpdate1 = PdoGsb::$monPdo->prepare($sql1);
		$requpdate1->execute(array($adresse1,$id));
	}
	public function updatecomptevisiteurprecp($cp1,$id){
		$sql = "UPDATE visiteur SET cp = '{$cp1}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($cp1,$id));
		$sql1 = "UPDATE visiteurcop SET cp = '{$cp1}' WHERE id = '{$id}' ";
		$requpdate1 = PdoGsb::$monPdo->prepare($sql1);
		$requpdate1->execute(array($cp1,$id));
	}
	public function updatecomptevisiteurpreville($ville1,$id){
		$sql = "UPDATE visiteur SET ville = '{$ville1}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($ville1,$id));
		$sql = "UPDATE visiteurcop SET ville = '{$ville1}' WHERE id = '{$id}' ";
		$requpdate1 = PdoGsb::$monPdo->prepare($sql1);
		$requpdate1->execute(array($ville1,$id));
	}
	public function updatemdp($mdp1,$id){
		$mdpcrip = password_hash($mdp1, PASSWORD_BCRYPT);
		$sql = "UPDATE visiteur SET mdp = '{$mdpcrip}' WHERE id = '{$id}' ";
		$reqmdpup = PdoGsb::$monPdo->prepare($sql);
		$reqmdpup->execute(array($mdpcrip,$id));
		$sql2 = "UPDATE visiteurcop SET mdp = '{$mdp1}' WHERE id = '{$id}' ";
		$reqmdpupcop = PdoGsb::$monPdo->prepare($sql2);
		$reqmdpupcop->execute(array($mdp1,$id));
	}




	public function updatecomptevisiteurid($idmodif,$id){
		$sql = "UPDATE visiteur SET id = '{$idmodif}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($idmodif,$id));
		$sql2 = "UPDATE visiteurcop SET id = '{$idmodif}' WHERE id = '{$id}' ";
		$reqmdpupcop = PdoGsb::$monPdo->prepare($sql2);
		$reqmdpupcop->execute(array($idmodif,$id));
	}
	public function updatecomptevisiteurnom1($nom,$id){
		$sql = "UPDATE visiteur SET nom = '{$nom}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($nom,$id));
		$sql2 = "UPDATE visiteurcop SET nom = '{$nom}' WHERE id = '{$id}' ";
		$reqmdpupcop = PdoGsb::$monPdo->prepare($sql2);
		$reqmdpupcop->execute(array($nom,$id));
	}
	public function updatecomptevisiteurprenom1($prenom,$id){
		$sql = "UPDATE visiteur SET prenom = '{$prenom}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($prenom,$id));
		$sql2 = "UPDATE visiteurcop SET prenom = '{$prenom}' WHERE id = '{$id}' ";
		$reqmdpupcop = PdoGsb::$monPdo->prepare($sql2);
		$reqmdpupcop->execute(array($prenom,$id));
	}
	public function updatecomptevisiteurlogin($login,$id){
		$sql = "UPDATE visiteur SET login = '{$login}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($login,$id));
		$sql2 = "UPDATE visiteurcop SET login = '{$login}' WHERE id = '{$id}' ";
		$reqmdpupcop = PdoGsb::$monPdo->prepare($sql2);
		$reqmdpupcop->execute(array($login,$id));
	}
	public function updatecomptevisiteuradresse($adresse,$id){
		$sql = "UPDATE visiteur SET adresse = '{$adresse}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($adresse,$id));
		$sql2 = "UPDATE visiteurcop SET adresse = '{$adresse}' WHERE id = '{$id}' ";
		$reqmdpupcop = PdoGsb::$monPdo->prepare($sql2);
		$reqmdpupcop->execute(array($adresse,$id));
	}
	public function updatecomptevisiteurcp($cp,$id){
		$sql = "UPDATE visiteur SET cp = '{$cp}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($cp,$id));
		$sql2 = "UPDATE visiteurcop SET cp = '{$cp}' WHERE id = '{$id}' ";
		$reqmdpupcop = PdoGsb::$monPdo->prepare($sql2);
		$reqmdpupcop->execute(array($cp,$id));
	}
	public function updatecomptevisiteurville($ville,$id){
		$sql = "UPDATE visiteur SET ville = '{$ville}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($ville,$id));
		$sql2 = "UPDATE visiteurcop SET ville = '{$ville}' WHERE id = '{$id}' ";
		$reqmdpupcop = PdoGsb::$monPdo->prepare($sql2);
		$reqmdpupcop->execute(array($ville,$id));
	}
	public function updatecomptevisiteurdate($datembauche,$id){
		$sql = "UPDATE visiteur SET dateEmbauche = '{$datembauche}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($datembauche,$id));
		$sql2 = "UPDATE visiteurcop SET dateEmbauche = '{$datembauche}' WHERE id = '{$id}' ";
		$reqmdpupcop = PdoGsb::$monPdo->prepare($sql2);
		$reqmdpupcop->execute(array($datembauche,$id));
	}
	public function updatecomptevisiteurstatu($statu,$id){
		$sql = "UPDATE visiteur SET statu-id = '{$statu}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($statu,$id));
		$sql2 = "UPDATE visiteurcop SET statu-id = '{$statu}' WHERE id = '{$id}' ";
		$reqmdpupcop = PdoGsb::$monPdo->prepare($sql2);
		$reqmdpupcop->execute(array($statu,$id));
	}
	public function updatecomptevisiteurmdp($mdp1,$id){
		$mdpcrip = password_hash($mdp1, PASSWORD_BCRYPT);
		$sql = "UPDATE visiteur SET mdp = '{$mdpcrip}' WHERE id = '{$id}' ";
		$requpdate = PdoGsb::$monPdo->prepare($sql);
		$requpdate->execute(array($mdpcrip,$id));
		$sql2 = "UPDATE visiteurcop SET mdp = '{$mdp1}' WHERE id = '{$id}' ";
		$reqmdpupcop = PdoGsb::$monPdo->prepare($sql2);
		$reqmdpupcop->execute(array($mdp1,$id));
	}

	public function createcompte($id,$nom,$prenom,$login,$mdp,$adresse,$cp,$ville,$date,$statu){
		$mdpcript = password_hash($mdp, PASSWORD_BCRYPT);
		$sql = "INSERT INTO `visiteur` (`id`,`nom`,`prenom`,`login`,`mdp`,`adresse`,`cp`,`ville`,`dateEmbauche`,`statu-id`) VALUE ('$id','$nom','$prenom','$login','$mdpcript','$adresse','$cp','$ville','$date','$statu')";
		var_dump($sql);
		$reqcrea = PdoGsb::$monPdo->prepare($sql);
		$reqcrea->execute(array($id,$nom,$prenom,$login,$mdpcript,$adresse,$cp,$ville,$date,$statu));
	}
	


/**
 * Retourne sous forme d'un tableau associatif toutes les lignes de frais hors forfait
 * concernées par les deux arguments
 * La boucle foreach ne peut être utilisée ici car on procède
 * à une modification de la structure itérée - transformation du champ date-
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @return tous les champs des lignes de frais hors forfait sous la forme d'un tableau associatif 
*/
	public function getLesFraisHorsForfait($idVisiteur,$mois){
	    $req = "select * from lignefraishorsforfait where lignefraishorsforfait.idvisiteur ='$idVisiteur' 
		and lignefraishorsforfait.mois = '$mois' ";	
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		$nbLignes = count($lesLignes);
		for ($i=0; $i<$nbLignes; $i++){
			$date = $lesLignes[$i]['date'];
			$lesLignes[$i]['date'] =  dateAnglaisVersFrancais($date);
		}
		return $lesLignes; 
	}
/**
 * Retourne le nombre de justificatif d'un visiteur pour un mois donné
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @return le nombre entier de justificatifs 
*/
	public function getNbjustificatifs($idVisiteur, $mois){
		$req = "select fichefrais.nbjustificatifs as nb from  fichefrais where fichefrais.idvisiteur ='$idVisiteur' and fichefrais.mois = '$mois'";
		$res = PdoGsb::$monPdo->query($req);
		$laLigne = $res->fetch();
		return $laLigne['nb'];
	}
/**
 * Retourne sous forme d'un tableau associatif toutes les lignes de frais au forfait
 * concernées par les deux arguments
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @return l'id, le libelle et la quantité sous la forme d'un tableau associatif 
*/
	public function getLesFraisForfait($idVisiteur, $mois){
		$req = "select fraisforfait.id as idfrais, fraisforfait.libelle as libelle, 
		lignefraisforfait.quantite as quantite from lignefraisforfait inner join fraisforfait 
		on fraisforfait.id = lignefraisforfait.idfraisforfait
		where lignefraisforfait.idvisiteur ='$idVisiteur' and lignefraisforfait.mois='$mois' 
		order by lignefraisforfait.idfraisforfait";	
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}
/**
 * Retourne tous les id de la table FraisForfait
 * @return un tableau associatif 
*/
	public function getLesIdFrais(){
		$req = "select fraisforfait.id as idfrais from fraisforfait order by fraisforfait.id";
		$res = PdoGsb::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
/**
 * Met à jour la table ligneFraisForfait
 * Met à jour la table ligneFraisForfait pour un visiteur et
 * un mois donné en enregistrant les nouveaux montants
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @param $lesFrais tableau associatif de clé idFrais et de valeur la quantité pour ce frais
 * @return un tableau associatif 
*/
	public function majFraisForfait($idVisiteur, $mois, $lesFrais){
		$lesCles = array_keys($lesFrais);
		foreach($lesCles as $unIdFrais){
			$qte = $lesFrais[$unIdFrais];
			$req = "update lignefraisforfait set lignefraisforfait.quantite = $qte
			where lignefraisforfait.idvisiteur = '$idVisiteur' and lignefraisforfait.mois = '$mois'
			and lignefraisforfait.idfraisforfait = '$unIdFrais'";
			PdoGsb::$monPdo->exec($req);
		}
	}
/**
 * met à jour le nombre de justificatifs de la table ficheFrais
 * pour le mois et le visiteur concerné
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
*/
	public function majNbJustificatifs($idVisiteur, $mois, $nbJustificatifs){
		$req = "update fichefrais set nbjustificatifs = $nbJustificatifs 
		where fichefrais.idvisiteur = '$idVisiteur' and fichefrais.mois = '$mois'";
		PdoGsb::$monPdo->exec($req);	
	}
/**
 * Teste si un visiteur possède une fiche de frais pour le mois passé en argument
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @return vrai ou faux 
*/	
	public function estPremierFraisMois($idVisiteur,$mois)
	{
		$ok = false;
		$req = "select count(*) as nblignesfrais from fichefrais 
		where fichefrais.mois = '$mois' and fichefrais.idvisiteur = '$idVisiteur'";
		$res = PdoGsb::$monPdo->query($req);
		$laLigne = $res->fetch();
		if($laLigne['nblignesfrais'] == 0){
			$ok = true;
		}
		return $ok;
	}
/**
 * Retourne le dernier mois en cours d'un visiteur
 * @param $idVisiteur 
 * @return le mois sous la forme aaaamm
*/	
	public function dernierMoisSaisi($idVisiteur){
		$req = "select max(mois) as dernierMois from fichefrais where fichefrais.idvisiteur = '$idVisiteur'";
		$res = PdoGsb::$monPdo->query($req);
		$laLigne = $res->fetch();
		$dernierMois = $laLigne['dernierMois'];
		return $dernierMois;
	}
	
/**
 * Crée une nouvelle fiche de frais et les lignes de frais au forfait pour un visiteur et un mois donnés
 * récupère le dernier mois en cours de traitement, met à 'CL' son champs idEtat, crée une nouvelle fiche de frais
 * avec un idEtat à 'CR' et crée les lignes de frais forfait de quantités nulles 
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
*/
	public function creeNouvellesLignesFrais($idVisiteur,$mois){
		$dernierMois = $this->dernierMoisSaisi($idVisiteur);
		$laDerniereFiche = $this->getLesInfosFicheFrais($idVisiteur,$dernierMois);
		if($laDerniereFiche['idEtat']=='CR'){
			$this->majEtatFicheFrais($idVisiteur, $dernierMois,'CL');
		}
		$req = "insert into fichefrais(idvisiteur,mois,nbJustificatifs,montantValide,dateModif,idEtat) 
		values('$idVisiteur','$mois',0,0,now(),'CR')";
		PdoGsb::$monPdo->exec($req);
		$lesIdFrais = $this->getLesIdFrais();
		foreach($lesIdFrais as $uneLigneIdFrais){
			$unIdFrais = $uneLigneIdFrais['idfrais'];
			$req = "insert into lignefraisforfait(idvisiteur,mois,idFraisForfait,quantite) 
			values('$idVisiteur','$mois','$unIdFrais',0)";
			PdoGsb::$monPdo->exec($req);
		 }
	}
/**
 * Crée un nouveau frais hors forfait pour un visiteur un mois donné
 * à partir des informations fournies en paramètre
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @param $libelle : le libelle du frais
 * @param $date : la date du frais au format français jj//mm/aaaa
 * @param $montant : le montant
*/
	public function creeNouveauFraisHorsForfait($idVisiteur,$mois,$libelle,$date,$montant){
		$dateFr = dateFrancaisVersAnglais($date);
		$req = "insert into lignefraishorsforfait 
		values('','$idVisiteur','$mois','$libelle','$dateFr','$montant')";
		PdoGsb::$monPdo->exec($req);
	}
/**
 * Supprime le frais hors forfait dont l'id est passé en argument 
 * @param $idFrais 
*/
	public function supprimerFraisHorsForfait($idFrais){
		$req = "delete from lignefraishorsforfait where lignefraishorsforfait.id =$idFrais ";
		$i = PdoGsb::$monPdo->exec($req);
		var_dump($i);
	}
/**
 * Retourne les mois pour lesquel un visiteur a une fiche de frais
 * @param $idVisiteur 
 * @return un tableau associatif de clé un mois -aaaamm- et de valeurs l'année et le mois correspondant 
*/
	public function getLesMoisDisponibles($idVisiteur){
		$req = "select fichefrais.mois as mois from  fichefrais where fichefrais.idvisiteur ='$idVisiteur' 
		order by fichefrais.mois desc ";
		$res = PdoGsb::$monPdo->query($req);
		$lesMois =array();
		$laLigne = $res->fetch();
		while($laLigne != null)	{
			$mois = $laLigne['mois'];
			$numAnnee =substr( $mois,0,4);
			$numMois =substr( $mois,4,2);
			$lesMois["$mois"]=array(
		     "mois"=>"$mois",
		    "numAnnee"  => "$numAnnee",
			"numMois"  => "$numMois"
             );
			$laLigne = $res->fetch(); 		
		}
		return $lesMois;
	}
/**
 * Retourne les informations d'une fiche de frais d'un visiteur pour un mois donné
 
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @return un tableau avec des champs de jointure entre une fiche de frais et la ligne d'état 
*/	
	public function getLesInfosFicheFrais($idVisiteur,$mois){
		$req = "select ficheFrais.idEtat as idEtat, ficheFrais.dateModif as dateModif, ficheFrais.nbJustificatifs as nbJustificatifs, 
			ficheFrais.montantValide as montantValide, etat.libelle as libEtat from  fichefrais inner join Etat on ficheFrais.idEtat = Etat.id 
			where fichefrais.idvisiteur ='$idVisiteur' and fichefrais.mois = '$mois'";
		$res = PdoGsb::$monPdo->query($req);
		$laLigne = $res->fetch();
		return $laLigne;
	}
/**
 * Modifie l'état et la date de modification d'une fiche de frais
 
 * Modifie le champ idEtat et met la date de modif à aujourd'hui
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 */
 
	public function majEtatFicheFrais($idVisiteur,$mois,$etat){
		$req = "update ficheFrais set idEtat = '$etat', dateModif = now() 
		where fichefrais.idvisiteur ='$idVisiteur' and fichefrais.mois = '$mois'";
		PdoGsb::$monPdo->exec($req);
	}
}
?>