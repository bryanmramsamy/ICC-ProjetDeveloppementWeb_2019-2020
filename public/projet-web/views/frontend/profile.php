<?php $title = $_SESSION['username'] . " | Profile"; ?>

<?php ob_start(); ?>

<section id="profile">
    Pseudonyme: <?= $profile['username']; ?>
    Email: <?= $profile['email']; ?>
    Inscrit le: <?= $profile['register_date']; ?>
    Nom de famille: <?= $_SESSION['last_name']; ?>
    Prénom: <?= $_SESSION['first_name']; ?>
    <!-- Avatar: <?= $_SESSION['username']; ?> -->

</section>

<?php $main_section = ob_get_clean(); ?>
<?php require('base.php'); ?>