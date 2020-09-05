<?php
session_start();
setcookie("pseudo","",time()-3600);
setcookie("mdp","",time()-3600);
$_SESSION = array();
session_destroy();
header("Location:../accueille.php");
?>
