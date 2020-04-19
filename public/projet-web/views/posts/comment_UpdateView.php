<?php
checkPermissions('user', true);

if (!checkPermissions('admin', false) && $_SESSION['userID'] != $comment['created_by']) header('Location: index.php?action=forbidden');

$title = "Modification du commentaire \"" . $comment['title'] . "\"";
ob_start();
?>

<h1>Modification du commentaire</h1>

<section id="comment_UpdateForm">

    <form method="post" action="index.php?action=post_comment_update_post&commentID=<?= $comment['id']; ?>">

        <?php # require('views/signals/signal_post_commentUpdate.php'); ?>

        <div>
            <label for='comment'>Commentaire : </label>
            <br/>
            <textarea name="comment" rows="8" cols="45" required><?= $comment['comment']; ?></textarea>
        </div>

        <?php if(checkPermissions('admin', false)){ ?>
        <div>
            <input type="checkbox" id="is_visible" name="is_visible" value="1" <?php if ($comment['is_visible'] == 1) echo ('checked'); ?>>
            <label for="is_visible">Rendre le commentaire visible ?</label>
        </div>
        <?php } ?>

        <div>
            <input type=submit value="Modifier le commentaire" /> <a href="index.php?action=post&postID=<?= $comment['post_id'];?>">Annuler</a>
        </div>

    </form>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>