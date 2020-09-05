<?php
$statu = $_SESSION["statu-id"];
if ($statu == !FALSE) {
    if ($statu == "visiteur") {
        include("vues/v_sommaire_visiteur.php");
    } elseif ($statu == "administrateur") {
        include("vues/v_sommaire_admin.php");
    } elseif ($statu == "comptable") {
        include("vues/v_sommaire_contable.php");
    }
}else{
    include("vues/v_sommaire_nolog.php");
}
include("vues/mentionlegal.php");