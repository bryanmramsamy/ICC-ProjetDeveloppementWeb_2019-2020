<?php $title = "Page non trouvée"; ?>

<?php ob_start(); ?>

<h1>La page que vous avez demandé n'existe pas</h1>

<h3><a href="index.php">Retourner à l'accueil</a></h3>

<?php $main_section = ob_get_clean(); ?>
<?php require('base.php'); ?>