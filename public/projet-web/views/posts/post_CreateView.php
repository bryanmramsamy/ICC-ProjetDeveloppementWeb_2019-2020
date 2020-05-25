<?php
$title = "Création d'un nouveau billet";
ob_start();
?>

<h1>Création d'un nouveau billet</h1>

<section id="post_CreateForm">
    <form method="POST" action="index.php?action=post_create_post">
        <div>
            <label for='title'>Titre : </label>
            <input class="form-control" type='text' id='title' name='title' required/>
        </div>

        <div>
            <label for='content'>Contenu du billet : </label>
            <br/>
            <textarea class="form-control" name="content" rows="8" cols="45" required></textarea>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" checked>
            <label class="form-check-label" for="is_published">Rendre le billet visible ?</label>
        </div>

        <div class="text-right">
            <input class="btn btn-primary" type=submit value="Poster le billet" /> <a class="btn btn-secondary" href="index.php?action=posts">Annuler</a>
        </div>
    </form>
</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
