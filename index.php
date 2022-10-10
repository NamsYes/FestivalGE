<?php 
require 'controllers/controllers.php';


try{
    getbdd();
    
}
catch (PDOException $e) {
    echo"ergerg";
    $msgErreur = $e->getMessage();
    die();
    require 'vueErreur.php';
}

if($_GET['action'] == 'etablissement')
afficheEtablissement();

else {
    afficheAccueil();
}

?>