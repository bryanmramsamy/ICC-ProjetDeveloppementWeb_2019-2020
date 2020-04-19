<?php $title = "Accès restreint"; ?>

<?php ob_start(); ?>

<h1><strong>Vous n'êtes pas autorisé à accéder à cette page.</strong>
<br/>Veuillez utiliser un compte ayant les permissions requises ou contacter l'administrateur du site.</h1>

<h3><a href="index.php">Retourner à l'accueil</a></h3>

<?php $main_section = ob_get_clean(); ?>
<?php require('base.php'); ?>