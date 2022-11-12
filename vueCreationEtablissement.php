<?php $nomtitre = 'création établissements'; ?>
<?php ob_start(); ?>

<?php
$nomtitre = 'créer';

$connexion=getbdd();
// CRÉER UN ÉTABLISSEMENT 

// Déclaration du tableau des civilités
$tabCivilite=array("M.","Mme","Melle");  

$action=$_REQUEST['page'];

echo $_REQUEST['page'];


// S'il s'agit d'une création et qu'on ne "vient" pas de ce formulaire (on 
// "vient" de ce formulaire uniquement s'il y avait une erreur), il faut définir 
// les champs à vide sinon on affichera les valeurs précédemment saisies

if ($action=='CreaEtablissement') 
{  
   $id='';
   $nom='';
   $adresseRue='';
   $ville='';
   $codePostal='';
   $tel='';
   $adresseElectronique='';
   $type=0;
   $civiliteResponsable='Monsieur';
   $nomResponsable='';
   $prenomResponsable='';
   $nombreChambresOffertes='';
}
else
{
   
   $id=$_REQUEST['id']; 
   $nom=$_REQUEST['nom']; 
   $adresseRue=$_REQUEST['adresseRue'];
   $codePostal=$_REQUEST['codePostal'];
   $ville=$_REQUEST['ville'];
   $tel=$_REQUEST['tel'];
   $adresseElectronique=$_REQUEST['adresseElectronique'];
   $type=$_REQUEST['type'];
   $civiliteResponsable=$_REQUEST['civiliteResponsable'];
   $nomResponsable=$_REQUEST['nomResponsable'];
   $prenomResponsable=$_REQUEST['prenomResponsable'];
   $nombreChambresOffertes=$_REQUEST['nombreChambresOffertes'];
   

   verifierDonneesEtabC($connexion, $id, $nom, $adresseRue, $codePostal, $ville, 
                        $tel, $nomResponsable, $nombreChambresOffertes);      
   if (nbErreurs()==0)
   {        
      creerEtablissement($connexion, $id, $nom, $adresseRue, $codePostal, $ville,  
                         $tel, $adresseElectronique, $type, $civiliteResponsable, 
                         $nomResponsable, $prenomResponsable, $nombreChambresOffertes);
   }   
}

 ?>

<form method='POST' action='index.php?page=CreaEtablissement'>
   
<input type='hidden' value='validerCreEtab' name='page'>

   <table width='85%' align='center' cellspacing='0' cellpadding='0' class='tabNonQuadrille'>
   
      <tr class='enTeteTabNonQuad'>
         <td colspan='3'>Nouvel établissement</td>
      </tr>

      <tr class='ligneTabNonQuad'>
         <td> Id * : </td>
         <td><input type='text' placeholder='Identifiant' value="<?php $id ?>" name='id' size ='10' 
         maxlength='8'></td>
      </tr>
     
      <tr class="ligneTabNonQuad">
         <td> Nom * : </td>
         <td><input type="text" placeholder='Entrer votre nom' value="<?php $nom?>" name="nom" size="50" 
         maxlength="45"></td>
      </tr>

      <tr class="ligneTabNonQuad">
         <td> Adresse * : </td>
         <td><input type="text" placeholder='Entrer votre adresse' value="<?php $adresseRue?>" name="adresseRue" 
         size="50" maxlength="45"></td>
      </tr>

      <tr class="ligneTabNonQuad">
         <td> Code postal * : </td>
         <td><input type="text" placeholder='35000' value="<?php $codePostal?>" name="codePostal" 
         size="8" maxlength="5"></td>
      </tr>

      <tr class="ligneTabNonQuad">
         <td> Ville * : </td>
         <td><input type="text" placeholder='Ville' value= "<?php $ville?>" name="ville" size="50" 
         maxlength="35"></td>
      </tr>

      <tr class="ligneTabNonQuad">
         <td> Téléphone * : </td>
         <td><input type="text" Placeholder='0123456901' value="<?php $tel?>" name="tel" size ="17" 
         maxlength="10"></td>
      </tr>

      <tr class="ligneTabNonQuad">
         <td> E-mail : </td>
         <td><input type="text" Placeholder='VotreMail@mail.com' value="<?php $adresseElectronique?>" name=
         "adresseElectronique" size ="50" maxlength="70"></td>
      </tr>

      <tr class="ligneTabNonQuad">
         <td> Type * : </td>
         <td>
            <?php if ($type==1): ?>
           
               <input type='radio' name='type' value='1' checked>  
               Etablissement Scolaire
               <input type='radio' name='type' value='0'>  Autre";
             
             <?php else : ?>
             
                <input type='radio' name='type' value='1'> 
                Etablissement Scolaire
                <input type='radio' name='type' value='0' checked> Autre
              
            <?php endif ; ?>
         </td>
      </tr>

      <tr class='ligneTabNonQuad'>
         <td colspan='2' ><strong>Responsable:</strong></td>
      </tr>

      <tr class='ligneTabNonQuad'>
         <td> Civilité * : </td>
         <td> 
            <select name='civiliteResponsable'>
            <?php for ($i=0; $i<3; $i=$i+1): ?>

                  <?php if ($tabCivilite[$i]==$civiliteResponsable):?> 
                     <option selected> <?php $tabCivilite[$i]?> </option>  
                  <?php else : ?>
                     <option> <?= $tabCivilite[$i] ?></option>
                  <?php endif;?>
             <?php endfor;?>

            </select>&nbsp; &nbsp; &nbsp; &nbsp; Nom * : 
            <input type="text" Placeholder='Nom du responsable' value="<?php $nomResponsable ?>" name=
            "nomResponsable" size="26" maxlength="25">
            &nbsp; &nbsp; &nbsp; &nbsp; Prénom: 
            <input type="text"  value="<?php $prenomResponsable?>" Placeholder='Prenom du responsable' name="prenomResponsable" size="26" maxlength="25">
         </td>
      </tr>

      <tr class="ligneTabNonQuad">
         <td> Nombre chambres offertes * : </td>
         <td><input type="text"  Placeholder='Nombre' value="<?php $nombreChambresOffertes ?>" name=
         "nombreChambresOffertes" size ="8" maxlength="3"></td>
      </tr>
   </table>
   
   <table align='center' cellspacing='15' cellpadding='0'>
      
      <tr>
         <td align='right'><input type='submit' value='Valider' name='valider'> </td>
         <td align='left'><input type='reset' value='Annuler' name='annuler'> </td>
      </tr>
      <tr>
         <td colspan='2' align='center'><a href='index.php?page=Etablissement'>Retour</a> </td>
      </tr>
   </table>
</form>
<?php

// En cas de validation du formulaire : affichage des erreurs ou du message de 
// confirmation
if ($action=='validerCreEtab'): ?>

   <?php if (nbErreurs()!=0): ?>
   
      <?php afficherErreurs(); ?>
   
   <?php else: ?>
   
      <h5><center>La création de l'établissement a été effectuée</center></h5>
   <?php endif; ?>
<?php endif; ?>

<?php $contenu =ob_get_clean(); ?>
<?php echo $contenu; ?>
