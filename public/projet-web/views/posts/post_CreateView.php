<?php
if ($_SESSION['user_role_lvl'] < 50) header('Location: index.php?action=forbidden');

$title = "Création d'un nouveau billet";
ob_start();
?>

<h1>Création d'un nouveau billet</h1>

<section id="post_CreateForm">

    <form method="post" action="index.php?action=post_create_post">

        <?php require('views/signals/signal_post_postCreation.php'); ?>

        <div>
            <label for='title'>Titre : </label>
            <input type='text' id='title' name='title' required/>
        </div>

        <div>
            <label for='content'>Contenu du billet : </label>
            <br/>
            <textarea name="content" rows="8" cols="45" required></textarea>
        </div>

        <div>
            <input type="checkbox" id="is_published" name="is_published" value="1" checked>
            <label for="is_published">Rendre le billet visible ?</label>
        </div>

        <div>
            <input type=submit value="Poster le billet" /> <a href="index.php?action=posts">Annuler</a>
        </div>

    </form>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
