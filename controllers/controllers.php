<?php  
require 'models/Modele.php';

$connexion=getbdd();
function erreur($msgErreur) {
    require'vueErreur.php';
}