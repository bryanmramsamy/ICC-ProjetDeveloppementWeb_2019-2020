<?php if ($_SESSION['user_role_lvl'] < 10) header('Location: index.php?action=forbidden'); ?>

    <?php $title = "Mini-Chat | Page " . $actual_page; ?>

    <?php ob_start(); ?>

    <section id="minichat_new_message">
        <?php require('minichat_new_message.php'); ?>
        <?php require('post_message_signal.php'); ?>
    </section>

    <section id="minichat">

        <?php while ($message = $messages->fetch()){ ?>
            <div class="minichat-message">
                <strong><?= htmlspecialchars($message['username']); ?></strong> a envoyé le <em><?= ($message['date_creation']); ?></em>:
                <br/>
                <p><?= nl2br(htmlspecialchars($message['message'])) ?></p>
            </div>
        <?php } ?>

        <?php require('pagination.php'); ?>
    </section>

    <?php $main_section = ob_get_clean(); ?>
    <?php require('base.php'); ?>