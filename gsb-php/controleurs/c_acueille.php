<?php
$statuid = $_SESSION['statu-id'];
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
?>