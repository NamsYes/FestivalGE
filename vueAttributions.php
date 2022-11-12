<?php $nomtitre = 'attributions'; 
ob_start(); 
$connexion=getbdd(); 

// Consult the attribution of all etablishment 

// There must be at least one etablishment offering rooms to display the link of modification 

$nbEtab=obtenirNbEtabOffrantChambres($connexion);
if ($nbEtab!=0); ?>
   
   <table width='75%' cellspacing='0' cellpadding='0' align='center'>
      <tr>
         <td>
            <a href='index.php?page=ModifAttribution'>Effectuer ou modifier les attributions</a>
         </td>
      </tr>
   </table> 
   <br>

   <!-- For each etablishment display of a table comprising 2 lines (Header and details of etablishment) -->

   <?php $req=obtenirReqEtablissementsAyantChambresAttribuées();
   $rsEtab= $connexion->query($req);
   $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC); ?>
   

   <!-- Loop on the etablishment with already assigned rooms -->

  <?php while($lgEtab!=FALSE): 
      $idEtab=$lgEtab['id'];
      $nomEtab=$lgEtab['nom']; ?>
   
      <table width='75%' cellspacing='0' cellpadding='0' align='center' 
      class='tabQuadrille'>
      
      <?php $nbOffre=$lgEtab["nombreChambresOffertes"];
      $nbOccup=obtenirNbOccup($connexion, $idEtab);

      // Calcul of the number of free rooms in the etablishment
      $nbChLib = $nbOffre - $nbOccup; ?>
      
      <!-- Display of the 1st header line -->
      
      <tr class='enTeteTabQuad'>
         <td colspan='2' align='left'><strong><?=$nomEtab ?></strong>&nbsp;(Offre : <?= $nbOffre?> &nbsp;&nbsp;Disponibilités : <?= $nbChLib?>)
         </td>
      </tr>

      <!-- Display of the 2nd header line -->

      <tr class='ligneTabQuad'>
         <td width='65%' align='left'>
            <i><strong>Nom groupe</strong></i>
         </td>

         <td width='35%' align='left'>
            <i><strong>Chambres attribuées</strong></i>
         </td>
      </tr>
        
      <!-- Display of the attribution details : AFFICHAGE DU DÉTAIL DES ATTRIBUTIONS : ONE LINE PER AFFECTED GROUP IN THE BUILDING -->
      <?php 
      $req=obtenirReqGroupesEtab($idEtab);
      $rsGroupe= $connexion->query($req);
      $lgGroupe=$rsGroupe->fetch(PDO::FETCH_ASSOC);
               
      // Loop on the group 

      while($lgGroupe):

         $idGroupe=$lgGroupe['id'];
         $nomGroupe=$lgGroupe['nom'];
         $nbpers = $lgGroupe['nombrePersonnes'];
         ?>

         <tr class='ligneTabQuad'>
            <td width='65%' align='left'><?=$nomGroupe?> (<?=$nbpers?> membres)</td>
            <?php $nbOccupGroupe=obtenirNbOccupGroupe($connexion, $idEtab, $idGroupe); ?>
            <td width='35%' align='left'><?=$nbOccupGroupe ?> </td>
         </tr>
         
         <?php $lgGroupe=$rsGroupe->fetch(PDO::FETCH_ASSOC); ?>

      <?php endwhile; ?>
      </table>
      <br>

      <?php $lgEtab=$rsEtab->fetch(PDO::FETCH_ASSOC); ?>

   <?php endwhile;?>
}

<?php $contenu =ob_get_clean(); ?>
<?php echo $contenu; ?>