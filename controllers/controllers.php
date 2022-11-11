<?php  
require 'models/Modele.php';
require 'PageTemplate.php';

if (isset($_GET['page'])) {
    
    $page =$_GET['page'];
    
    switch ($page) {

        case 'Accueil' :

            afficheAccueil();
            break;
        
        case 'Etablissement' :

            afficheEtablissement();
            break;
    
        case 'Attribution' :
    
            afficheAttributions();
            break;
    
        default :
            echo 'Vous essayer de vous rendre sur une page inexistante';
            break;
    
        // require 'Vueindex.php';
    
        //     break;
        
    }
    
    } else {
        echo 'Vous essayer de vous rendre sur une page inexistante';
    }
    

