<?php
session_start();

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=portskfh_projet_bandes_dessines;charset=utf8', 'cpses_po0syomhxl', '',$pdo_options);
//$bdd=mysqli_connect("example.com.mysql", "cpses_po0syomhxl", "", "database");


?>