<?php
$title = "Modification du billet \"" . $post['title'] . "\"";
ob_start();
?>

<h1>Modification du billet "<?= $post['title']; ?>"</h1>

<section>
    <form method="post" action="index.php?action=post_update_post&postID=<?= $post['id']; ?>">
        <div>
            <label for='title'>Titre : </label>
            <input class="form-control" type='text' id='title' name='title' value='<?= $post['title']; ?>' required/>
        </div>

        <div>
            <label for='content'>Contenu du billet : </label>
            <textarea class="form-control" id="content" name="content" rows="8" cols="45" required><?= $post['content']; ?></textarea>
        </div>

        <div class="form-check">
            <input class="form-check-input"type="checkbox" id="is_published" name="is_published" value="1" <?php if ($post['is_published'] == 1) echo ('checked'); ?>>
            <label class="form-check-label" for="is_published">Rendre le billet visible ?</label>
        </div>

        <div class="text-right">
            <input class="btn btn-primary" type=submit value="Modifier le billet" /> <a class="btn btn-secondary" href="index.php?action=posts">Annuler</a>
        </div>
    </form>
</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
