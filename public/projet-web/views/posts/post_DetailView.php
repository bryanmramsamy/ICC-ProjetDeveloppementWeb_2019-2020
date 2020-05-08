<?php
$title = $post['title'];
ob_start();
?>

<section id="post">
    <?php
    $post_displayed_name = displayed_name($post_created_by['username'], $post_created_by['first_name'], $post_created_by['last_name']);
    $post_bg_color = $post['is_published'] ? "primary" : "danger";
    ?>

    <div class="alert alert-<?= $post_bg_color; ?>">
        <h2 class="alert-heading d-flex justify-content-center"><?= htmlspecialchars($post['title']) ?></h2>
        <hr>
        <p class="text-justify"><?= nl2br(htmlspecialchars($post['content'])) ?></p>
        <hr>
        <p class="mb-0">Posté le <em><?= ($post['date_created']); ?></em> <?php if ($post['date_edited'] != $post['date_created']) echo("et édité le <em>" . $post['date_edited']) . "</em>"; ?> par <strong><?= htmlspecialchars($post_displayed_name); ?></strong><p>

        <div class="text-right">
            <?php require('views/posts/post_admin_options.php') ?>
            <a class="btn btn-primary" href="index.php?action=posts">Revenir à la liste des billets</a>
        </div>
    </div>
</section>

<section id="comments">

    <?php if (checkPermissions('user', false)) { ?>
    <section id="comment-form">
        <form method="post" action="index.php?action=post_comment_create_post&postID=<?= $postID; ?>">
            <div class="form-group">
                <label for='comment'>Commentaire : </label>
                <textarea class="form-control" name="comment" rows="4" cols="45" required></textarea>
                <small id="comment" class="form-text text-muted">Votre commentaire peut être modifé ou supprimé par les administrateurs du site</small>
            </div>

            <div class="form-group text-right">
                <input class="btn btn-primary" type=submit value="Poster le commentaire" /> <a class="btn btn-secondary" href="index.php?action=post&postID=<?= $postID; ?>">Annuler</a>
            </div>
        </form>
    </section>

<?php
    }

require('views/static/pagination.php');

while ($comment = $comments->fetch()) { 
    if ($comment['post_id'] == $postID && ($comment['is_visible'] || checkPermissions('admin', false))) {
        $comment_displayed_name = displayed_name($comment['username'], $comment['first_name'], $comment['last_name']);
        $comment_bg_color = $comment['is_visible'] ? "dark" : "danger";
?>
    <div class="alert alert-<?= $comment_bg_color; ?>">
        <h5 class="mb-0"><?= nl2br(htmlspecialchars($comment['comment'])) ?></h5>
        <hr>
        <p class="mb-0">Envoyé le <em><?= ($comment['date_created']); ?></em> <?php if ($comment['date_edited'] != $comment['date_created']) echo("et édité le <em>" . $comment['date_edited']) . "</em>"; ?> par <strong><?= htmlspecialchars($comment_displayed_name); ?></strong><p>

        <div class="text-right">
            <?php require('views/posts/comment_admin_options.php'); ?>
        </div>
    </div>
<?php
    }
}

require('views/static/pagination.php');
?>
</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
