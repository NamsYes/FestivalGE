<?php $nomtitre = 'Etablissements'; ?>

<?php ob_start(); 

//Connection to the database
$connexion = getbdd();

//Preparation of the SQL reques
$req = $connexion->query(obtenirReqEtablissements());      

//Conversion to associative array 
$result = $req->fetchAll();  ?>

<!-- Head of the table -->
                                     
<table width='70%' cellspacing='0' cellpadding='0' align='center' class='tabNonQuadrille'>

   <tr class='enTeteTabNonQuad'>
      <td colspan='4'>Etablissements</td>
   </tr>

<!-- Body of the table -->

<!-- Display with a loop -->
<?php foreach ($result as $row):                        
   $id = $row['id']; ?>
   
		<tr class='ligneTabNonQuad'>

         <td width='52%'>
            <?=$row['nom']?>
         </td>
         
         <td width='16%' align='center'> 
            <a href='vueDetailEtablissement.php?id=$id'>Voir détail</a>
         </td>

         <td width='16%' align='center'> 
            <a href='vueModificationEtablissement.php?action=demanderModifEtab&amp;id=$id'> Modifier</a>
         </td>

         <!--If there are already assignments for the establishment, they must first be deleted before the establishment can be deleted. -->
         <?php if (!existeAttributionsEtab($connexion, $id)): ?>
			
            <td width='16%' align='center'> 
               <a href='vueSuppressionEtablissement.php?action=demanderSupprEtab&amp;id=$id'> Supprimer</a>
            </td>
      
         <?php else: ?>
         
         <td width='16%'>
            <?=(obtenirNbOccup($connexion, $id)." attributions") ?>
         </td>

        <?php endif;?>

      </tr>

<?php endforeach;?>

<!-- Footer of the table -->
      <tr class='ligneTabNonQuad'>
         <td colspan='4'><a href='vueCreationEtablissement.php?action=demanderCreEtab'>Création d'un établissement</a ></td>
     </tr>
   </table>




   
<!-- Display without PDO  -->

<!-- <table width='70%' cellspacing='0' cellpadding='0' align='center' class='tabNonQuadrille'>
   <tr class='enTeteTabNonQuad'>
      <td colspan='4'>Etablissements</td>
   </tr> -->
<!--      

   $req=obtenirReqEtablissements();
   $rsEtab=mysql_query($req, $connexion);
   $lgEtab=mysql_fetch_array($rsEtab);

   //Loop for dispay Etablishment 
   while ($result): ?> -->
   
		<!-- <tr class='ligneTabNonQuad'>
         <td width='52%'><?=$result['nom']?></td>
         
         <td width='16%' align='center'> 
            <a href='detailEtablissement.php?id=$id'>Voir détail</a>
         </td>
         
         <td width='16%' align='center'> 
            <a href='modificationEtablissement.php?action=demanderModifEtab&amp;id=$id'>Modifier</a>
         </td>
      	 -->
         <!-- If there are already attributions for the establishment, it will be necessary delete them first before you can delete the establishment -->
			<!-- if (!existeAttributionsEtab($connexion, $id)):?>
		
            <td width='16%' align='center'> 
            <a href='suppressionEtablissement.php?action=demanderSupprEtab&amp;id=$id'>
            Supprimer</a></td>";
         
            else : ?> 
         
            <td width='16%'>&nbsp; </td>       
			endif; 
      </tr>

   $lgEtab=mysql_fetch_array($rsEtab);

   endwhile; 
   
   <tr class='ligneTabNonQuad'>
      <td colspan='4'><a href='creationEtablissement.php?action=demanderCreEtab'>Création d'un établissement</a ></td>
  </tr>
</table> !->$_COOKIE
<?php $contenu =ob_get_clean(); ?>
<?php echo $contenu; ?>