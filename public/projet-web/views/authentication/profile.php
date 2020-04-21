<?php $title = $_SESSION['username'] . " | Profile"; ?>

<?php ob_start(); ?>

<section id="profile">
    <ul>
        <li>Pseudonyme: <?= $profile['username']; ?></li>
        <li>Email: <?= $profile['email']; ?></li>
        <li>Inscrit le: <?= $profile['register_date']; ?></li>
        <li>Nom de famille: <?= $_SESSION['last_name']; ?></li>
        <li>Prénom: <?= $_SESSION['first_name']; ?></li>
        <li>Adresse: <?= $profile['address']; ?></li>
        <li>Code postal: <?= $profile['zipcode']; ?></li>
        <li>Date de naissance: <?= $profile['date_birth']; ?></li>
        <!-- <li>Image: <?= $profile['picture']; ?></li> -->
    </ul>
</section>

<a href="index.php?action=profile_update">Modifier votre profile d'utilisateur</a>

<?php $main_section = ob_get_clean(); ?>
<?php require('views/static/base.php'); ?>