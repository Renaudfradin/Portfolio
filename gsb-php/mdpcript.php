<?php
$serveur='mysql:host=localhost';
$bdd='dbname=bdsmvc';   		
$user='root';    		
$mdp='';	

/* fin paramètres*/

$pdo = new PDO($serveur.';'.$bdd, $user, $mdp);
$pdo->query("SET CHARACTER SET utf8"); 

$reqmdp = $pdo->query("SELECT * FROM visiteur");
while ($mdp = $reqmdp->fetch()){
    echo $mdp['mdp'];
    $id = $mdp['id'];
    echo $id;
    echo"<br>";
    $mdpcrip = password_hash($mdp['mdp'], PASSWORD_BCRYPT);
    $mdp1 = $mdpcrip;
    echo $mdpcrip;
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $reqmdpcrip = $pdo->prepare("UPDATE visiteur SET mdp= '{$mdp1}'  WHERE id =  '{$id}' ");
    var_dump($reqmdpcrip);
    $reqmdpcrip->execute(array($id,$mdp1));
}

?>