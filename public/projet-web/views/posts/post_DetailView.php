<?php
if (!$post['is_published'] && $_SESSION['user_role_lvl'] < 50) header('Location: index.php?action=forbidden');

$title = $post['title'];

ob_start();
?>

<section class="before_post">
    <?php
    require('views/signals/signal_post_postPublication.php');
    require('views/signals/signal_post_postUpdate.php');
    ?>
</section>


<section id="post">

    <?php $post_displayed_name = displayed_name($post_created_by['username'], $post_created_by['first_name'], $post_created_by['last_name']); ?>

    <div class="post">

        <strong><?= htmlspecialchars($post_displayed_name); ?></strong> a envoyé le <em><?= ($post['date_edited']); ?></em>
        <br/>
        <?php require('views/posts/post_admin_options.php') ?>

        <h1><?= htmlspecialchars($post['title']) ?></h1>

        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>

        <p>-----------------------------------------------------------------------------------------------------------</p>

    </div>

</section>

<section id="comments">

    
<?php if (checkPermissions('user', false)) { ?>

    <section id="comment-form">

        <?php require('views/signals/signal_post_commentCreation.php'); ?>

        <form method="post" action="index.php?action=post_comment_create_post&postID=<?= $postID; ?>">

            <div>
                <label for='comment'>Commentaire : </label>
                <br/>
                <textarea name="comment" rows="8" cols="45" required></textarea>
            </div>

            <div>
                <input type=submit value="Poster le commentaire" /> <a href="index.php?action=post&postID=<?= $postID; ?>">Annuler</a>
            </div>

        </form>

    </section>

<?php } ?>

    <?php
    while ($comment = $comments->fetch()) { 
        if ($comment['post_id'] == $postID && ($comment['is_visible'] == true || checkPermissions('admin', false))) {
    ?>
        <div class="comment">

            <?php $comment_displayed_name = displayed_name($comment['username'], $comment['first_name'], $comment['last_name']); ?>

            <strong><?= htmlspecialchars($comment_displayed_name); ?></strong> a envoyé le <em><?= ($comment['date_edited']); ?></em>
            <br/>
            <?php require('views/posts/comment_admin_options.php') ?>

            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

            <p>-----------------------------------------------------------------------------------------------------------</p>

        </div>
    <?php }} ?>

</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>