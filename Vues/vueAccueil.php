<?php $nomtitre = 'accueil'; ?>

<?php ob_start(); ?>

<div class="home" align=center style="color:white;background-color:red;">
<h2> Cette application web permet de gérer l'hébergement des équipes de sport durant le festival Sp'Or organisé par la M2L. </h2></br>
<h2> Elle offre les services suivants :</h2>
<h2> Gérer les établissements (caractéristiques et capacités d'accueil) acceptant d'héberger les participants.</br>
Consulter, réaliser ou modifier les attributions des chambres aux équipes dans les établissements.</h2>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php echo $contenu ?>
