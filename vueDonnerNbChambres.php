<?php $nomtitre = 'Donner nb chambres'; ?>
<?php ob_start(); ?>
<?php
include("models/Modele.php"); 

$connexion=getbdd();
// SÉLECTIONNER LE NOMBRE DE CHAMBRES SOUHAITÉES

$idEtab=$_REQUEST['idEtab'];
$idGroupe=$_REQUEST['idGroupe'];
$nbChambres=$_REQUEST['nbChambres'];

echo "
<form method='POST' action='vueModificationAttributions.php'>
	<input type='hidden' value='validerModifAttrib' name='action'>
   <input type='hidden' value='$idEtab' name='idEtab'>
   <input type='hidden' value='$idGroupe' name='idGroupe'>";
   $nomGroupe=obtenirNomGroupe($connexion, $idGroupe);
   
   echo "
   <br><center><h5>Combien de chambres souhaitez-vous pour le 
   groupe $nomGroupe dans cet établissement ?";
   
   echo "&nbsp;<select name='nbChambres'>";
   for ($i=0; $i<=$nbChambres; $i++)
   {
      echo "<option>$i</option>";
   }
   echo "
   </select></h5>
   <input type='submit' value='Valider' name='valider'>&nbsp&nbsp&nbsp&nbsp
   <input type='reset' value='Annuler' name='Annuler'><br><br>
   <a href='vueModificationAttributions.php?action=demanderModifAttrib'>Retour</a>
   </center>
</form>";

?>

<?php $contenu =ob_get_clean(); ?>
<?php require 'pageTemplate.php'; ?>
<?php echo $contenu; ?>