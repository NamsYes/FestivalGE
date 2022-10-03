<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<!-- TITRE ET MENUS -->
<html lang="fr">
<head>
<?php
echo "<title>Sp'Or - $nomtitre </title>"; ?>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/cssGeneral.css" rel="stylesheet" type="text/css">
</head>
<body class="basePage">

<!--  Tableau contenant le titre -->
<table width="100%" cellpadding="0" cellspacing="0">
   <tr> 
      <td class="titre">Festival Sp'Or <br>
      <span id="texteNiveau2" class="texteNiveau2">
      H&eacute;bergement des équipes</span><br>&nbsp;
      </td>
   </tr>
</table>

<!--  Tableau contenant les menus -->

<?php

function affmenu($lacc, $leta, $latt)
{
echo "
<table width='80%' cellpadding='0' cellspacing='0' class='tabMenu' align='center'>
   <tr>
      <td class='menu'><a class='$lacc' href='index.php'>Accueil</a></td>
      <td class='menu' ><a class='$leta' href='listeEtablissements.php' >
      Gestion établissements</a></td>
      <td class='menu'><a class='$latt' href='consultationAttributions.php'>
      Attributions chambres</a></td>
   </tr>
</table>
<br>";
}

switch($nomtitre) {
   case "accueil":
      affmenu("active","","");
      break;
   case "établissements":
      affmenu("","active","");
      break;
   case "détails":
      affmenu("","active","");
      break;
   case "modifier":
      affmenu("","active","");
      break;
   case "créer":
      affmenu("","active","");
      break;
   case "attributions":
      affmenu("","","active");
      break;      
}

?>