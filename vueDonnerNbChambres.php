<?php $nomtitre = 'Donner nb chambres'; ?>
<?php ob_start(); ?>
<?php

$connexion=getbdd();
// SÉLECTIONNER LE NOMBRE DE CHAMBRES SOUHAITÉES

$idEtab=$_REQUEST['idEtab'];
$idGroupe=$_REQUEST['idGroupe'];
$nbChambres=$_REQUEST['nbChambres'];
echo $nbChambres;
echo $idGroupe;

?>
<form method='POST' action='index.php?page=ModifAttribution'>
	<input type='hidden' value='validerModifAttrib' name='action'>
   <input type='hidden' value='$idEtab' name='idEtab'>
   <input type='hidden' value='$idGroupe' name='idGroupe'>
   
   <?php $nomGroupe=obtenirNomGroupe($connexion, $idGroupe); ?>
   

   <br><center>
      <h5>Combien de chambres souhaitez-vous pour le groupe <?=$nomGroupe?> dans cet établissement ?"&nbsp;
   
   <select name='nbChambres'>

      <?php for ($i=0; $i<=$nbChambres; $i++) : ?>
         <option> <?=$i?></option>
      <?php endfor;?>
   </select></h5>

   <input type='submit' value='Valider' name='valider'> 
   <input type='reset' value='Annuler' name='Annuler'><br><br>
   <a href='index.php?page=ModifAttribution'>Retour</a>
   </center>
</form>


<?php $contenu =ob_get_clean(); ?>
<?php echo $contenu; ?>