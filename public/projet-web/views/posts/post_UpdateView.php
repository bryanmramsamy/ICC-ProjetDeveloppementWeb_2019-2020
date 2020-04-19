<?php
checkPermissions('admin', true);

$title = "Modification du billet \"" . $post['title'] . "\"";
ob_start();
?>

<h1>Modification du billet "<?= $post['title']; ?>"</h1>

<section id="post_UpdateForm">

    <form method="post" action="index.php?action=post_update_post&postID=<?= $post['id']; ?>">

        <?php require('views/signals/signal_post_postUpdate.php'); ?>

        <div>
            <label for='title'>Titre : </label>
            <input type='text' id='title' name='title' value='<?= $post['title']; ?>'/>
        </div>

        <div>
            <label for='content'>Contenu du billet : </label>
            <br/>
            <textarea name="content" rows="8" cols="45"><?= $post['content']; ?></textarea>
        </div>

        <div>
            <input type="checkbox" id="is_published" name="is_published" value="1" <?php if ($post['is_published'] == 1) echo ('checked'); ?>>
            <label for="is_published">Rendre le billet visible ?</label>
        </div>

        <div>
            <input type=submit value="Modifier le billet" /> <a href="index.php?action=posts">Annuler</a>
        </div>

    </form>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
