<?php $title = $post['title']; ?>

<?php ob_start(); ?>

<?php if ($_SESSION['user_role_lvl'] >= 50){ ?>

    <section id="posts_create_post">
        <a href="posts_create_post">Créer un nouveau billet</a> 
        <?php # require('post_post_signal.php'); ?>
    </section>

<?php } ?>

<section id="post">

    <?php if ($created_by['last_name'] != null && $created_by['first_name'] != null){
            $displayed_name = $created_by['first_name'] . " " . $created_by['last_name'];
        } else {
            $displayed_name = $created_by['username'];
        } // TODO: Put in separate file
    ?>
        <div class="post">
            <strong><?= htmlspecialchars($displayed_name); ?></strong> a envoyé le <em><?= ($post['date_edited']); ?></em>:
            <h1><?= htmlspecialchars($post['title']) ?></h1>
            <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
        </div>

</section>

<?php $main_section = ob_get_clean(); ?>
<?php require('base.php'); ?>