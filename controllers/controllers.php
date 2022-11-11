<?php  
require 'models/Modele.php';
require 'PageTemplate.php';


if (isset($_GET['page'])) {
    
    $page =$_GET['page'];
    
    switch ($page) {
        
        case 'Etablissement' :
    
            afficheEtablissement();
            break;
    
        // case 'images' :
    
        //     require 'Vueimages.php';
        //     break;
    
        // case 'home' :
    
        // require 'Vueindex.php';
    
        //     break;
        
    }
    } else {
        echo 'Erreur';
    }
    
 
 ?>
