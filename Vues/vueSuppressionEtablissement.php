<?php $nomtitre = 'Supprimer établissements'; ?>
<?php ob_start(); ?>
<?php

//Récupération de la connexion
$connexion=getbdd();

$id=$_REQUEST['id']; 

//Requette pour récupérer le nom de l'établissment
$lgEtab=obtenirDetailEtablissement($connexion, $id);
$nom=$lgEtab['nom'];

// Cas 1ère étape (on vient de listeEtablissements.php)

if ($_REQUEST['valid']=='yes'):?>

   <br><center><h5>Souhaitez-vous vraiment supprimer l'établissement <?= $nom?> ? 
   <br><br>
   <a href='index.php?page=SuppEtablissement&id=<?= $id?>&valid=no'>
   Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
   <a href='index.php?page=Etablissement'>Non</a></h5></center>";

<!-- Cas 2ème étape (on vient de suppressionEtablissement.php) -->

<?php else : 
   supprimerEtablissement($connexion, $id);?>

   <br><br><center><h5>L'établissement <?=$nom ?> a été supprimé</h5>
   <a href='index.php?page=Etablissement'>Retour</a></center>";

<?php endif ;?>  

<?php $contenu =ob_get_clean(); ?>
<?php echo $contenu; ?>