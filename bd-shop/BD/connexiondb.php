<?php


$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=projet_bandes_dessines;charset=utf8', 'root', '',$pdo_options);


?>