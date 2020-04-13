<?php $title = "Inscription"; ?>

<?php

if (isset($_SESSION['userID']) && isset($_SESSION['userID'])) {
    header('Location: index.php');

} else {
    ob_start();

?>

    <section id="home_section">
        <form action="views/backend/register_post.php" method="POST">

            <h1>Veuillez compléter le formulaire de vos informations afin de vous inscrire sur ICC-2020 Web Project</h1>

            <div>
                <label for='input_username'>Pseudonyme : </label>
                <input type='text' id='input_username' name='input_username' required/>
                <?php if ($_GET['error_code'] == 1 || $_GET['error_code'] == 3) print("<strong>Pseudonyme déjà existant ! Veuillez en choisir un autre !</strong>"); ?>
            </div>

            <div>
                <label for='input_password'>Mot de passe : </label>
                <input type='password' id='input_password' name='input_password' required/>
            </div>

            <div>
                <label for='input_password_confirmation'>Confirmation du mot de passe : </label>
                <input type='password' id='input_password_confirmation' name='input_password_confirmation' required/>
                <?php if ($_GET['error_code'] <= 2) print("<strong>Les mots de passe ne correspondent pas !</strong>"); ?>
            </div>

            <div>
                <label for='input_email'>Adresse mail : </label>
                <input type='email' id='input_email' name='input_email' />
            </div>

            <div>
                <label for='input_last_name'>Nom : </label>
                <input type='text' id='input_last_name' name='input_last_name' />
            </div>

            <div>
                <label for='input_first_name'>Prénom : </label>
                <input type='text' id='input_first_name' name='input_first_name' />
            </div>

            <div>
                <input type=submit value="S'inscrire" />
            </div>

        </form>
    </section>

<?php }

$main_section = ob_get_clean();
require('base.php');

?>