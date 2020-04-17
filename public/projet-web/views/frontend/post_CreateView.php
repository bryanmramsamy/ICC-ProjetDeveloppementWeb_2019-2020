<?php
if ($_SESSION['user_role_lvl'] < 50) header('Location: index.php?action=forbidden');

$title = $post['title'];
ob_start();
?>

<h1>Création d'un nouveau billet</h1>

<section id="post_CreateForm">

    <form method="post" action="index.php?action=post_post">

        <div>
            <label for='title'>Titre : </label>
            <input type='text' id='title' name='title' required/>
            <!-- <?php // if ($_GET['post_register_signal'] == 'already_exist'){ ?>
                <strong>Pseudonyme déjà existant ! Veuillez en choisir un autre !</strong>
            <?php // } ?> -->
        </div>

        <div>
            <label for='title'>Contenu du billet : </label>
            <br/>
            <textarea name="content" rows="8" cols="45" required></textarea>
            <!-- <?php // if ($_GET['post_register_signal'] == 'already_exist'){ ?>
                <strong>Pseudonyme déjà existant ! Veuillez en choisir un autre !</strong>
            <?php // } ?> -->
        </div>

        <div>
            <input type="checkbox" id="is_published" name="is_published" value="1" checked>
            <label for="is_published">Rendre le billet visible ?</label>
        </div>

        <div>
            <input type=submit value="Poster le billet" />
        </div>

    </form>

<?php
$main_section = ob_get_clean();

require('base.php');
?>

