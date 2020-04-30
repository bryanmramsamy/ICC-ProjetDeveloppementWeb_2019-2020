<?php
$title = 'Profile de ' . $user['username'];

ob_start();
?>

<section class="h4">
    <div class="row">
        <div class="col">Pseudonyme:</div>
        <div class="col"><?= $user['username']; ?></div>
    </div>
    <hr>
    <div class="row">
        <div class="col">Adresse électronique:</div>
        <div class="col"><?= $user['email']; ?></div>
    </div>
    <hr>
    <div class="row">
        <div class="col">Date d'inscription:</div>
        <div class="col"><?= $user['register_date']; ?></div>
    </div>
    <hr>
    <div class="row">
        <div class="col">Prénom:</div>
        <div class="col"><?= $user['first_name']; ?></div>
    </div>
    <hr>
    <div class="row">
        <div class="col">Nom de famille:</div>
        <div class="col"><?= $user['last_name']; ?></div>
    </div>
    <hr>
    <div class="row">
        <div class="col">Adresse:</div>
        <div class="col"><?= $user['address'];; ?><br/><?= $user['zipcode']; ?></div>
    </div>
    <hr>
    <div class="row">
        <div class="col">Date de naissance:</div>
        <div class="col"><?= $user['date_birth']; ?></div>
    </div>
    <hr>
    <!-- <div class="row">
        <div class="col">Photo de profile:</div>
        <div class="col"><?= $user['picture']; ?></div>
    </div> -->
</section>

<div class="text-right pb-2">
    <a class="btn btn-primary" href="index.php?action=profile_update">Modifier votre profile d'utilisateur</a>
    <a class="btn btn-secondary" href="index.php?action=password_change">Changer votre mot de passe</a>
</div>

<?php
$main_section = ob_get_clean();
require('views/static/base.php');
?>
