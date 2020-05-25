<?php
$title = "Modification du message du MiniChat";
ob_start();
?>

<h1>Modification du message du MiniChat</h1>

<section>
    <form method="POST" action="index.php?action=minichat_update_post&messageID=<?= $message['messageID']; ?>">
        <div>
            <label for='message'>Message :</label>
            <textarea class="form-control" id="message" name="message" rows="4" cols="45" required><?= $message['message']; ?></textarea>
            <small id="message" class="form-text text-muted">Votre message peut être modifé ou supprimé par les administrateurs du site</small>
        </div>

        <?php if(checkPermissions('admin', false)){ ?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_visible" name="is_visible" value="1" <?php if ($message['is_visible'] == 1) echo ('checked'); ?>>
            <label class="form-check-label" for="is_visible">Rendre le message visible ?</label>
        </div>

        <?php } else { ?>
            <div>
                <input type='hidden' id='is_visible' name='is_visible' value='1'/>
            </div>
        <?php } ?>

        <div class="form-group text-right">
            <input class="btn btn-primary" type=submit value="Modifier le message" /> <a class="btn btn-secondary" href="index.php?action=post&postID=<?= $message['post_id'];?>">Annuler</a>
        </div>
    </form>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
