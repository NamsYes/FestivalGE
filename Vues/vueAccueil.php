<?php $nomtitre = 'accueil'; ?>

<?php ob_start(); ?>

<div class="home">
    <p> Cette application web permet de gérer l'hébergement des équipes de sport durant le festival Sp'Or organisé par la M2L. </p></br>
    <p> Elle offre les services suivants :</p>
    <p> Gérer les établissements (caractéristiques et capacités d'accueil) acceptant d'héberger les participants.</br>
    Consulter, réaliser ou modifier les attributions des chambres aux équipes dans les établissements.</p>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php echo $contenu ?>
