<?php
$nomtitre = 'attributions';
include("_debut.inc.php");
include("_gestionBase.inc.php"); 
include("_controlesEtGestionErreurs.inc.php");
include("_connexion-PDO.inc.php");


// EFFECTUER OU MODIFIER LES ATTRIBUTIONS POUR L'ENSEMBLE DES ÉTABLISSEMENTS

// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ DE 2 LIGNES D'EN-TÊTE (LIGNE TITRE ET 
// LIGNE ÉTABLISSEMENTS) ET DU DÉTAIL DES ATTRIBUTIONS 
// UNE LÉGENDE FIGURE SOUS LE TABLEAU

// Recherche du nombre d'établissements offrant des chambres pour le 
// dimensionnement des colonnes
$nbEtabOffrantChambres=obtenirNbEtabOffrantChambres($dbh);
$nb=$nbEtabOffrantChambres+1;
// Détermination du pourcentage de largeur des colonnes "établissements"
$pourcCol=50/$nbEtabOffrantChambres;

$action=$_REQUEST['action'];

// Si l'action est validerModifAttrib (cas où l'on vient de la page 
// donnerNbChambres.php) alors on effectue la mise à jour des attributions dans 
// la base 
if ($action=='validerModifAttrib')
{
   $idEtab=$_REQUEST['idEtab'];
   $idGroupe=$_REQUEST['idGroupe'];
   $nbChambres=$_REQUEST['nbChambres'];
   modifierAttribChamb($dbh, $idEtab, $idGroupe, $nbChambres);
}

echo "
<table width='80%' cellspacing='0' cellpadding='0' align='center' 
class='tabQuadrille'>";

   // AFFICHAGE DE LA 1ÈRE LIGNE D'EN-TÊTE
   echo "
   <tr class='enTeteTabQuad'>
      <td colspan=$nb><strong>Attributions</strong></td>
   </tr>";
      
   // AFFICHAGE DE LA 2ÈME LIGNE D'EN-TÊTE (ÉTABLISSEMENTS)
   echo "
   <tr class='ligneTabQuad'>
      <td>&nbsp;</td>";
      
   $req=obtenirReqEtablissementsOffrantChambres();
   $rsEtab= $dbh->query($req);
   $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);

   // Boucle sur les établissements (pour afficher le nom de l'établissement et 
   // le nombre de chambres encore disponibles)
   while ($lgEtab!=FALSE)
   {
      $idEtab=$lgEtab["id"];
      $nom=$lgEtab["nom"];
      $nbOffre=$lgEtab["nombreChambresOffertes"];
      $nbOccup=obtenirNbOccup($dbh, $idEtab);
                    
      // Calcul du nombre de chambres libres
      $nbChLib = $nbOffre - $nbOccup;
      echo "
      <td valign='top' width='$pourcCol%'><i>Disponibilités : $nbChLib </i> <br>
      $nom </td>";
      $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
   }
   echo "
   </tr>"; 

   // CORPS DU TABLEAU : CONSTITUTION D'UNE LIGNE PAR GROUPE À HÉBERGER AVEC LES 
   // CHAMBRES ATTRIBUÉES ET LES LIENS POUR EFFECTUER OU MODIFIER LES ATTRIBUTIONS
         
   $req=obtenirReqIdNomGroupesAHeberger();
   $rsGroupe= $dbh->query($req);
   $lgGroupe= $rsGroupe->fetch(PDO::FETCH_ASSOC);
         
   // BOUCLE SUR LES GROUPES À HÉBERGER 
   while ($lgGroupe!=FALSE)
   {
      $idGroupe=$lgGroupe['id'];
      $nom=$lgGroupe['nom'];
      $nbpers = $lgGroupe['nombrePersonnes'];

      echo "
      <tr class='ligneTabQuad'>
         <td width='25%'>$nom ($nbpers membres)</td>";
      $req=obtenirReqEtablissementsOffrantChambres();
      $rsEtab=$dbh->query($req);
      $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
           
      // BOUCLE SUR LES ÉTABLISSEMENTS
      while ($lgEtab!=FALSE)
      {
         $idEtab=$lgEtab["id"];
         $nbOffre=$lgEtab["nombreChambresOffertes"];
         $nbOccup=obtenirNbOccup($dbh, $idEtab);
                   
         // Calcul du nombre de chambres libres
         $nbChLib = $nbOffre - $nbOccup;
                  
         // On recherche si des chambres ont déjà été attribuées à ce groupe
         // dans cet établissement
         $nbOccupGroupe=obtenirNbOccupGroupe($dbh, $idEtab, $idGroupe);
         
         // Cas où des chambres ont déjà été attribuées à ce groupe dans cet
         // établissement
         if ($nbOccupGroupe!=0)
         {
            // Le nombre de chambres maximum pouvant être demandées est la somme 
            // du nombre de chambres libres et du nombre de chambres actuellement 
            // attribuées au groupe (ce nombre $nbmax sera transmis si on 
            // choisit de modifier le nombre de chambres)
            $nbMax = $nbChLib + $nbOccupGroupe;
            echo "
            <td class='reserve'>
            <a href='donnerNbChambres.php?idEtab=$idEtab&amp;idGroupe=$idGroupe&amp;nbChambres=$nbMax'>
            $nbOccupGroupe</a></td>";
         }
         else
         {
            // Cas où il n'y a pas de chambres attribuées à ce groupe dans cet 
            // établissement : on affiche un lien vers donnerNbChambres s'il y a 
            // des chambres libres sinon rien n'est affiché     
            if ($nbChLib != 0)
            {
               echo "
               <td class='reserveSiLien'>
               <a href='donnerNbChambres.php?idEtab=$idEtab&amp;idGroupe=$idGroupe&amp;nbChambres=$nbChLib'>
               __</a></td>";
            }
            else
            {
               echo "<td class='reserveSiLien'>&nbsp;</td>";
            }
         }    
         $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC);
      } // Fin de la boucle sur les établissements    
      $lgGroupe= $rsGroupe->fetch(PDO::FETCH_ASSOC);  
   } // Fin de la boucle sur les groupes à héberger
echo "
</table>"; // Fin du tableau principal

// AFFICHAGE DE LA LÉGENDE
echo "
<table align='center' width='80%'>
   <tr>
      <td width='34%' align='left'><a href='consultationAttributions.php'>Retour</a>
      </td>
      <td class='reserveSiLien'>&nbsp;</td>
      <td width='30%' align='left'>Réservation possible si lien</td>
      <td class='reserve'>&nbsp;</td>
      <td width='30%' align='left'>Chambres réservées</td>
   </tr>
</table>";

?>
