<?php 
require 'models/Modele.php';
try{
    getbdd();
    require 'vueAccueil.php';
}
catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    die();
    require 'vueErreur.php';
}
?>

