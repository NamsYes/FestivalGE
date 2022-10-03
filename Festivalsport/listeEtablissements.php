<?php
$nomtitre = 'établissements';
include("_debut.inc.php");
include("_gestionBase.inc.php"); 
include("_controlesEtGestionErreurs.inc.php");
include("_connexion-PDO.inc.php");


//affichage avec pdo

$req = $dbh->query(obtenirReqEtablissements());       //attraper le resultat de la requete
$result = $req->fetchAll(PDO::FETCH_ASSOC);           //le mettre dans un tableau associatif

//entete du tableau
echo "                                                
<table width='70%' cellspacing='0' cellpadding='0' align='center' class='tabNonQuadrille'>
   <tr class='enTeteTabNonQuad'>
      <td colspan='4'>Etablissements</td>
   </tr>"
;

//corps du tableau
foreach ($result as $row){                            //afficher le tout
   $id = $row['id']; 
   echo "
		<tr class='ligneTabNonQuad'>
         <td width='52%'>".$row['nom']."</td>
         
         <td width='16%' align='center'> 
         <a href='detailEtablissement.php?id=$id'>
         Voir détail</a></td>

         <td width='16%' align='center'> 
         <a href='modificationEtablissement.php?action=demanderModifEtab&amp;id=$id'>
         Modifier</a></td>"
   ;

         // S'il existe déjà des attributions pour l'établissement, il faudra
         // d'abord les supprimer avant de pouvoir supprimer l'établissement
         if (!existeAttributionsEtab($dbh, $id))
			{
            echo "
            <td width='16%' align='center'> 
            <a href='suppressionEtablissement.php?action=demanderSupprEtab&amp;id=$id'>
            Supprimer</a></td>";
         }
         else
         {
            echo "
            <td width='16%'>(".obtenirNbOccup($dbh, $id)." attributions)
            </td>
            </tr>";          
			}  
}

//enqueue du tableau
echo "
      <tr class='ligneTabNonQuad'>
         <td colspan='4'><a href='creationEtablissement.php?action=demanderCreEtab'>
         Création d'un établissement</a ></td>
     </tr>
   </table>"
;

/* affichage sans pdo (mysql_connect est obsolete)

// AFFICHER L'ENSEMBLE DES ÉTABLISSEMENTS
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// ÉTABLISSEMENT

echo "
<table width='70%' cellspacing='0' cellpadding='0' align='center' class='tabNonQuadrille'>
   <tr class='enTeteTabNonQuad'>
      <td colspan='4'>Etablissements</td>
   </tr>";
     
   $req=obtenirReqEtablissements();
   $rsEtab=mysql_query($req, $connexion);
   $lgEtab=mysql_fetch_array($rsEtab);
   BOUCLE SUR LES ÉTABLISSEMENTS
   while ($result)
   {
      echo "
		<tr class='ligneTabNonQuad'>
         <td width='52%'>$result['nom']</td>
         
         <td width='16%' align='center'> 
         <a href='detailEtablissement.php?id=$id'>
         Voir détail</a></td>
         
         <td width='16%' align='center'> 
         <a href='modificationEtablissement.php?action=demanderModifEtab&amp;id=$id'>
         Modifier</a></td>";
      	
         // S'il existe déjà des attributions pour l'établissement, il faudra
         // d'abord les supprimer avant de pouvoir supprimer l'établissement
			if (!existeAttributionsEtab($connexion, $id))
			{
            echo "
            <td width='16%' align='center'> 
            <a href='suppressionEtablissement.php?action=demanderSupprEtab&amp;id=$id'>
            Supprimer</a></td>";
         }
         else
         {
            echo "
            <td width='16%'>&nbsp; </td>";          
			}
			echo "
      </tr>";
      $lgEtab=mysql_fetch_array($rsEtab);
   }   
   echo "
   <tr class='ligneTabNonQuad'>
      <td colspan='4'><a href='creationEtablissement.php?action=demanderCreEtab'>
      Création d'un établissement</a ></td>
  </tr>
</table>";

*/

?>