<?php $title = 'Profile de ' . $user['username']; ?>

<?php ob_start(); ?>

<?php require('views/signals/signal_post_password_change.php'); ?>

<section id="profile">
    <ul>
        <li>Pseudonyme: <?= $user['username']; ?></li>
        <li>Email: <?= $user['email']; ?></li>
        <li>Inscrit le: <?= $user['register_date']; ?></li>
        <li>Nom de famille: <?= $user['last_name']; ?></li>
        <li>Prénom: <?= $user['first_name']; ?></li>
        <li>Adresse: <?= $user['address']; ?></li>
        <li>Code postal: <?= $user['zipcode']; ?></li>
        <li>Date de naissance: <?= $user['date_birth']; ?></li>
        <!-- <li>Image: <?= $user['picture']; ?></li> -->
    </ul>
</section>

<a href="index.php?action=profile_update">Modifier votre user d'utilisateur</a>

<?php $main_section = ob_get_clean(); ?>
<?php require('views/static/base.php'); ?>