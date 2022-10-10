<?php $nomtitre = 'Supprimer établissements'; ?>
<?php ob_start(); ?>
<?php

include("models/Modele.php"); 

$connexion=getbdd();
// SUPPRIMER UN ÉTABLISSEMENT 

$id=$_REQUEST['id'];  

$lgEtab=obtenirDetailEtablissement($connexion, $id);
$nom=$lgEtab['nom'];

// Cas 1ère étape (on vient de listeEtablissements.php)

if ($_REQUEST['action']=='demanderSupprEtab')    
{
   echo "
   <br><center><h5>Souhaitez-vous vraiment supprimer l'établissement $nom ? 
   <br><br>
   <a href='vueSuppressionEtablissement.php?action=validerSupprEtab&amp;id=$id'>
   Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
   <a href='vueEtablissement.php?'>Non</a></h5></center>";
}

// Cas 2ème étape (on vient de suppressionEtablissement.php)

else
{
   supprimerEtablissement($connexion, $id);
   echo "
   <br><br><center><h5>L'établissement $nom a été supprimé</h5>
   <a href='vueEtablissement.php?'>Retour</a></center>";
}

?>

<?php $contenu =ob_get_clean(); ?>
<?php require 'pageTemplate.php'; ?>
<?php echo $contenu; ?>