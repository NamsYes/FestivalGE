<?php $nomtitre = 'Detail Etablissement'; ?>
<?php ob_start(); ?>
<?php
include("models/Modele.php"); 


$connexion=getbdd();
$id=$_REQUEST['id'];  

// OBTENIR LE DÉTAIL DE L'ÉTABLISSEMENT SÉLECTIONNÉ

$lgEtab=obtenirDetailEtablissement($connexion, $id);

$nom=$lgEtab['nom'];
$adresseRue=$lgEtab['adresseRue'];
$codePostal=$lgEtab['codePostal'];
$ville=$lgEtab['ville'];
$tel=$lgEtab['tel'];
$adresseElectronique=$lgEtab['adresseElectronique'];
$type=$lgEtab['type'];
$civiliteResponsable=$lgEtab['civiliteResponsable'];
$nomResponsable=$lgEtab['nomResponsable'];
$prenomResponsable=$lgEtab['prenomResponsable'];
$nombreChambresOffertes=$lgEtab['nombreChambresOffertes'];

echo "
<table width='60%' cellspacing='0' cellpadding='0' align='center' 
class='tabNonQuadrille'>
   
   <tr class='enTeteTabNonQuad'>
      <td colspan='3'>$nom</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td  width='20%'> Id: </td>
      <td>$id</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Adresse: </td>
      <td>$adresseRue</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Code postal: </td>
      <td>$codePostal</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Ville: </td>
      <td>$ville</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Téléphone: </td>
      <td>$tel</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> E-mail: </td>
      <td>$adresseElectronique</td>
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Type: </td>";
      if ($type==1)
      {
         echo "<td> Etablissement scolaire </td>";
      }
      else
      {
         echo "<td> Autre établissement </td>";
      }
   echo "
   </tr>
   <tr class='ligneTabNonQuad'>
      <td> Responsable: </td>
      <td>$civiliteResponsable&nbsp; $nomResponsable&nbsp; $prenomResponsable
      </td>
   </tr> 
   <tr class='ligneTabNonQuad'>
      <td> Offre: </td>
      <td>$nombreChambresOffertes&nbsp;chambre(s)</td>
   </tr>
</table>
<table align='center'>
   <tr>
      <td align='center'><a href='vueEtablissement.php'>Retour</a>
      </td>
   </tr>
</table>";
?>

<?php $contenu =ob_get_clean(); ?>
<?php require 'pageTemplate.php'; ?>
<?php echo $contenu; ?>