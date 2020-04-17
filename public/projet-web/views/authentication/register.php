<?php
if (isset($_SESSION['userID']) && isset($_SESSION['userID'])) header('Location: index.php');

$title = "Inscription";

ob_start();
?>

    <section id="home_section">

        <form action="index.php?action=register_post" method="post">

            <h1>Veuillez compléter le formulaire de vos informations afin de vous inscrire sur ICC-2020 Web Project</h1>

            <?php if ($_GET['signal_post_userRegister'] == 'invalid_inputs'){ ?>
                    <strong>Un pseudonyme est un mot de passe sont nécéssaires !</strong>
            <?php }

            if ($_GET['signal_post_userRegister'] == 'failed'){ ?>
                    <strong>Une erreur s'est produite ! Veuillez réessayer !</strong>
            <?php } ?>

            <div>
                <label for='username'>Pseudonyme : </label>
                <input type='text' id='username' name='username' required/>

                <?php if ($_GET['signal_post_userRegister'] == 'already_exist'){ ?>
                    <strong>Pseudonyme déjà existant ! Veuillez en choisir un autre !</strong>
                <?php } ?>
            </div>

            <div>
                <label for='password'>Mot de passe : </label>
                <input type='password' id='password' name='password' required/>
            </div>

            <div>
                <label for='password_confirmation'>Confirmation du mot de passe : </label>
                <input type='password' id='password_confirmation' name='password_confirmation' required/>

                <?php if ($_GET['signal_post_userRegister'] == 'passwords_mismatch'){ ?>
                    <strong>Les mots de passe ne correspondent pas ! Veuillez réesayer !</strong>
                <?php } ?>
            </div>

            <div>
                <label for='email'>Adresse mail : </label>
                <input type='email' id='email' name='email' />
            </div>

            <div>
                <label for='last_name'>Nom : </label>
                <input type='text' id='last_name' name='last_name' />
            </div>

            <div>
                <label for='first_name'>Prénom : </label>
                <input type='text' id='first_name' name='first_name' />
            </div>

            <div>
                <input type=submit value="S'inscrire" />
            </div>

        </form>

    </section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>