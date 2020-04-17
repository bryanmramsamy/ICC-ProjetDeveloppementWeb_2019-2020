<?php $title = "Billets | Page " . $actual_page; ?>

<?php ob_start(); ?>

<?php if ($_SESSION['user_role_lvl'] >= 50){ ?>

    <section id="posts_create_post">
        <a href="index.php?action=post_create">Créer un nouveau billet</a>
        <br/>
        <?php require('signal_post_postCreation.php'); ?>
    </section>

<?php } ?>

<section id="posts">

    <?php while ($post = $posts->fetch()){ 
        if ($post['last_name'] != null && $post['first_name'] != null){
            $displayed_name = $post['first_name'] . " " . $post['last_name'];
        } else {
            $displayed_name = $post['username'];
        } // TODO: Put in separate file
    ?>
        <div class="post">
            <strong><?= htmlspecialchars($displayed_name); ?></strong> a envoyé le <em><?= ($post['date_edited']); ?></em>:
            <h1><?= htmlspecialchars($post['title']) ?></h1>
            <p><?= nl2br(htmlspecialchars(truncate($post['content']))) ?> (<a href="index.php?action=post&postID=<?= $post['postID'] ?>">Voir plus...</a>)</p>
        </div>
    <?php } ?>

    <?php require('pagination.php'); ?>
</section>

<?php $main_section = ob_get_clean(); ?>
<?php require('base.php'); ?>