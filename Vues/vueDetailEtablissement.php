<?php $nomtitre = 'Detail Etablissement'; ?>
<?php ob_start(); ?>
<?php $connexion=getbdd(); 
$id=$_GET['id'];
?>

<?php

// OBTENIR LE DÉTAIL DE L'ÉTABLISSEMENT SÉLECTIONNÉ

$lgEtab=obtenirDetailEtablissement($connexion, $id);

$adresseRue=$lgEtab['adresseRue']; 

$nom=$lgEtab['nom'];
$codePostal=$lgEtab['codePostal'];
$ville=$lgEtab['ville'];
$tel=$lgEtab['tel'];
$adresseElectronique=$lgEtab['adresseElectronique'];
$type=$lgEtab['type'];
$civiliteResponsable=$lgEtab['civiliteResponsable'];
$nomResponsable=$lgEtab['nomResponsable'];
$prenomResponsable=$lgEtab['prenomResponsable'];
$nombreChambresOffertes=$lgEtab['nombreChambresOffertes'];
?>


<table width='60%' cellspacing='0' cellpadding='0' align='center' 
class='tabNonQuadrille'>
   
   <tr class='enTeteTabNonQuad'>
      <td colspan='3'><?=$nom ?></td>
   </tr>

   <tr class='ligneTabNonQuad'>
      <td  width='20%'> Id: </td>
      <td> <?=$nom ?></td>
   </tr>

   <tr class='ligneTabNonQuad'>
      <td> Adresse: </td>
      <td><?= $adresseRue ?> </td>
   </tr>

   <tr class='ligneTabNonQuad'>
      <td> Code postal: </td>
      <td><?=$codePostal?></td>
   </tr>

   <tr class='ligneTabNonQuad'>
      <td> Ville: </td>
      <td><?=$ville?></td>
   </tr>

   <tr class='ligneTabNonQuad'>
      <td> Téléphone: </td>
      <td><?=$tel?></td>
   </tr>

   <tr class='ligneTabNonQuad'>
      <td> E-mail: </td>
      <td><?=$adresseElectronique?></td>
   </tr>

   <tr class='ligneTabNonQuad'>
      <td> Type : </td>
      <?php if ($type==1): ?>
         <td> Etablissement scolaire </td>
      <?php else : ?>
          <td> Autre établissement </td>
      <?php endif; ?>
   </tr>

   <tr class='ligneTabNonQuad'>
      <td> Responsable: </td>
      <td><?= $civiliteResponsable ?> .&nbsp; <?= $nomResponsable ?>&nbsp; <?= $prenomResponsable ?></td>
   </tr> 

   <tr class='ligneTabNonQuad'>
      <td> Offre: </td>
      <td><?php $nombreChambresOffertes ?>&nbsp;chambre(s)</td>
   </tr>
</table>

<table align='center'>
   <tr>
      <td align='center'><a href='index.php?page=Etablissement'>Retour</a>
      </td>
   </tr>
</table>


<?php $contenu =ob_get_clean(); ?>
<?php echo $contenu; ?>