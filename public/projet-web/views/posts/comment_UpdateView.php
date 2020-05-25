<?php
$title = "Modification du commentaire \"" . $comment['title'] . "\"";
ob_start();
?>

<h1>Modification du commentaire</h1>

<section id="comment_UpdateForm">
    <form method="POST" action="index.php?action=post_comment_update_post&commentID=<?= $comment['id']; ?>">
        <div>
            <label for='comment'>Commentaire : </label>
            <textarea class="form-control" id="comment" name="comment" rows="4" cols="45" required><?= $comment['comment']; ?></textarea>
            <small id="comment" class="form-text text-muted">Votre commentaire peut être modifé ou supprimé par les administrateurs du site</small>
        </div>

        <?php if(checkPermissions('admin', false)){ ?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible" value="1" <?php if ($comment['is_visible'] == 1) echo ('checked'); ?>>
            <label class="form-check-label" for="is_visible">Rendre le commentaire visible ?</label>
        </div>

        <?php } else { ?>
            <div>
                <input type='hidden' id='is_visible' name='is_visible' value='1'/>
            </div>
        <?php } ?>

        <div class="form-group text-right">
            <input class="btn btn-primary" type=submit value="Modifier le commentaire" /> <a class="btn btn-secondary" href="index.php?action=post&postID=<?= $comment['post_id'];?>">Annuler</a>
        </div>
    </form>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
