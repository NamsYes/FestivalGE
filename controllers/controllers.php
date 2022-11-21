<?php  
require 'models/Modele.php';
require 'Vues/PageTemplate.php';

if (isset($_GET['page'])) {
    
    $page =$_GET['page'];
    
    if (true) {
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

            case 'DetailEtablissement' :

                afficheDetailEtablissement();
                break;

            case 'CreaEtablissement' :

                afficheCreationEtablissement();
                break;   
            

            case 'SuppEtablissement' :

                afficheSuppressionEtablissement();
                break;     
                
            case 'ModifAttribution' :

                afficheModificationAttributions();
                break; 
                
            case 'DonnerNbChambre' :

                afficheDonnerNbChambres();
                break; 


            default :

                 afficheErreur();
                break; 

        }
    }  
    
    else 
    {
        echo 'hrbrbhrb';
    }
}
