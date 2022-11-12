<?php $nomtitre = 'Erreur'; ?>

<?php ob_start() ?>
    <div class="display" align='center'>
        <h1 > Oops une erreur est survenue ! </h1>
        <img  src="https://cdn-icons-png.flaticon.com/512/1448/1448663.png" alt="Erreur" style="height:8Opx;">
    </div>
<?php $contenu =ob_get_clean(); ?>
<?php echo $contenu; ?>
