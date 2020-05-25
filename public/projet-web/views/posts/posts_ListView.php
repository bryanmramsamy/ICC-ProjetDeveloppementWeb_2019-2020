<?php
$title = "Billets | Page " . $actual_page;
ob_start();

if (checkPermissions('admin', false)){
?>

<section class="pb-2" id="before_posts">
    <a class="btn btn-info btn-lg btn-block" href="index.php?action=post_create">Créer un nouveau billet</a>
</section>

<?php } ?>

<section id="posts">
    <?php
    require('views/static/pagination.php');

    while ($post = $posts->fetch()){
        if ($post['is_published'] || checkPermissions('modo', false)) {
            $displayed_name = displayed_name($post['username'], $post['first_name'], $post['last_name']);
            $bg_color = $post['is_published'] ? "primary" : "danger";
    ?>
        <div class="alert alert-<?= $bg_color; ?>">
            <h4 class="alert-heading d-flex justify-content-center"><?= htmlspecialchars($post['title']) ?></h4>
            <hr>
            <p><?= nl2br(htmlspecialchars(truncate($post['content']))) ?></p>
            <hr>
            <p class="mb-0">Posté le <em><?= ($post['date_created']); ?></em> <?php if ($post['date_edited'] != $post['date_created']) echo("et édité le <em>" . $post['date_edited']) . "</em>"; ?> par <strong><?= htmlspecialchars($displayed_name); ?></strong><p>

            <div class="text-right">
                <?php require('views/posts/post_admin_options.php') ?>
                <a class="btn btn-primary" href="index.php?action=post&postID=<?= $post['postID'] ?>">Voir plus...</a>
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
