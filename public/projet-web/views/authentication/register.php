<?php
if (isset($_SESSION['userID']) && isset($_SESSION['userID'])) header('Location: index.php');

$title = "Inscription";
ob_start();
?>

<section>
    <form action="index.php?action=register_post" method="post">
        <h2 class="text-justify">Veuillez compléter le formulaire de vos informations afin de procéder à votre inscription et créer votre compte</h1>

        <div class="form-group">
            <label for='username'>Pseudonyme : </label>
            <input class="form-control" type='text' id='username' name='username' required/>

            <?php if ($_GET['signal_post_userRegister'] == 'already_exist'){ ?>
                <small class="form-text text-danger">Pseudonyme déjà existant ! Veuillez en choisir un autre. S'il est question de votre compte, essayer de vous connecter avec celui-ci dans la section "Connexion" en haut de la page.</small>
            <?php } else { ?>
                <small class="form-text text-muted">Veuillez entre un pseudonyme qui vous serivra de nom d'utilisateur. Veuillez ne pas oublier celui-ci après la création de votre compte. vous ne pouvez pas utiliser un pseudonyme déjà utilisé.</small>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for='password'>Mot de passe : </label>
            <input class="form-control" type='password' id='password' name='password' required/>
            <small class="form-text text-muted">Veuillez ne pas oublier votre mot de passe. Celui-ci pourra être changé une fois votre compte créé.</small>
        </div>

        <div class="form-group">
            <label for='password_confirmation'>Confirmation du mot de passe : </label>
            <input class="form-control" type='password' id='password_confirmation' name='password_confirmation' required/>

            <?php if ($_GET['signal_post_userRegister'] == 'passwords_mismatch'){ ?>
                <small class="form-text text-danger">La confirmation de votre mot de passe ne correspond pas à votre mot de passe. Veuillez rééssayer ou utiliser un autre mot de passe.</small>
            <?php } else { ?>
                <small class="form-text text-muted">Veuillez entrer votre mot de passe une nouvelle fois afin de confirmer celui-ci.</small>
            <?php } ?>
        </div>

        <div class="row">

            <div class="col form-group">
                <label for='last_name'>Nom : </label>
                <input class="form-control" type='text' id='last_name' name='last_name' />
                <small class="form-text text-muted">Ce champ est facultatif.</small>

            </div>

            <div class="col form-group">
                <label for='first_name'>Prénom : </label>
                <input class="form-control" type='text' id='first_name' name='first_name' />
                <small class="form-text text-muted">Ce champ est facultatif.</small>

            </div>

            <div class="col form-group">
                <label for='email'>Adresse mail : </label>
                <input class="form-control" type='email' id='email' name='email' />
                <small class="form-text text-muted">Ce champ est facultatif</small>
            </div>
        </div>

        <div class="text-right">
            <input class="btn btn-primary" type=submit value="S'inscrire" />
            <a class="btn btn-secondary" href="index.php">Revenir à l'accueil</a>
        </div>
    </form>

    <br>
</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>