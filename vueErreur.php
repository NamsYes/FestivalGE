<?php $nomtitre = 'Erreur'; ?>

<?php ob_start() ?>
<p>Une erreur est survenue : <?=$msgErreur ?></p>
<?php $contenu = ob_get_clean(); ?>
<?php require 'pageTemplate.php';
