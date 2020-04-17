<?php
$title = "Billets | Page " . $actual_page;

ob_start();

if ($_SESSION['user_role_lvl'] >= PERMISSION['admin']){ ?>

    <section id="before_posts">

        <a href="index.php?action=post_create">Créer un nouveau billet</a>
        <br/>
        <?php require('views/signals/signal_post_postCreation.php'); ?>

    </section>

<?php } ?>

<section id="posts">

    <?php
    while ($post = $posts->fetch()){
        if ($post['is_published'] || $_SESSION['user_role_lvl'] >= PERMISSION['admin']) {
            $displayed_name = displayed_name($post['username'], $post['first_name'], $post['last_name']);
    ?>

            <div class="post">

                <strong><?= htmlspecialchars($displayed_name); ?></strong> a envoyé le <em><?= ($post['date_edited']); ?></em>
                <br/>
                <?php require('views/posts/post_publish.php') ?>
                
                <h2><?= htmlspecialchars($post['title']) ?></h2>

                <p>
                    <?= nl2br(htmlspecialchars(truncate($post['content']))) ?>
                    <br/>
                    (<a href="index.php?action=post&postID=<?= $post['postID'] ?>">Voir plus...</a>)
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
