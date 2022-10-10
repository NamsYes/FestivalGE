<?php  
require 'models/Modele.php';


function afficheEtablissement() 
{
    require'vueEtablissement.php'; 
}

function afficheAccueil() 
{
    require'vueAccueil.php'; 
}

function afficheAttributions() 
{
    require'vueAttributions.php'; 
}

function afficheCreationEtablissement() 
{
    require'vueCreationEtablissement.php'; 
}

function afficheDetailEtablissement() 
{
    require'vueDetailEtablissement.php'; 
}

function afficheDonnerNbChambres() 
{
    require'vueDonnerNbChambres.php'; 
}

function afficheErreur() 
{
    require'vueErreur.php'; 
}

function afficheModificationAttributions() 
{
    require'vueModificationAttributions.php'; 
}

function afficheModificationEtablissement() 
{
    require'vueModificationEtablissement.php'; 
}

function afficheSuppressionEtablissement() 
{
    require'vueSuppressionEtablissement.php'; 
}



$connexion=getbdd();
function erreur($msgErreur) {
    require'vueErreur.php';
}

    
   
  switch($x){
 case 1:    
    $nomtitre=vueTemplate;
  break;    
 case 2:    
    $x=vueTemplate;
  break;    
 case 3:    
    $x=vueTemplate; 
  break;    
 case 4:    
    $x=vueTemplate;   
  break;
  case 5:    
    $x=vueTemplate; 
  break;    
 case 6:    
    $x=vueTemplate;   
  break;
}   

?> 