<?php
$title = 'Profile de ' . $user['username'];

ob_start();

require('views/signals/signal_post_password_change.php');
require('views/signals/signal_post_profileUpdate.php');
?>

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

(<a href="index.php?action=profile_update">Modifier votre user d'utilisateur</a>) (<a href="index.php?action=password_change">Changer mot de passe</a>)

<?php $main_section = ob_get_clean(); ?>
<?php require('views/static/base.php'); ?>