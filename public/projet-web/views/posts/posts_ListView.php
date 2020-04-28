<?php
$title = "Billets | Page " . $actual_page;

ob_start();

if (checkPermissions('admin', false)){ ?>

    <section id="before_posts">

        <a class="btn btn-info btn-lg btn-block" href="index.php?action=post_create">Créer un nouveau billet</a>
        <br/>
        <?php
        require('views/signals/signal_post_postCreation.php');
        require('views/signals/signal_post_postUpdate.php');
        require('views/signals/signal_post_commentCreation.php')
        ?>

    </section>

<?php } ?>

<section id="posts">

    <?php
    while ($post = $posts->fetch()){
        if ($post['is_published'] || checkPermissions('admin', false)) {
            $displayed_name = displayed_name($post['username'], $post['first_name'], $post['last_name']);
    ?>

            <div class="bs-callout bs-callout-default">

                <strong><?= htmlspecialchars($displayed_name); ?></strong> a envoyé le <em><?= ($post['date_edited']); ?></em>                
                <h2><?= htmlspecialchars($post['title']) ?></h2>

                <p>
                    <?= nl2br(htmlspecialchars(truncate($post['content']))) ?>
                    <br/>
                    <a class="btn btn-info" href="index.php?action=post&postID=<?= $post['postID'] ?>">Voir plus...</a>

                    <?php require('views/posts/post_admin_options.php') ?>

                </p>

                <p>-----------------------------------------------------------------------------------------------------------</p>
            </div>
    <?php
        }
    }
    ?>

    <?php require('views/static/pagination.php'); ?>

</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
