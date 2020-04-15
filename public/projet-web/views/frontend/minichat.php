<?php if ($_SESSION['user_role_lvl'] < 10) header('Location: index.php?action=forbidden'); ?>

    <?php $title = "Mini-Chat | Page " . $actual_page; ?>

    <?php ob_start(); ?>

    <section id="minichat_new_message">
        <?php require('minichat_new_message.php'); ?>
        <?php require('post_message_signal.php'); ?>
    </section>

    <section id="minichat">

        <?php while ($message = $messages->fetch()){ 
            if ($message['last_name'] != null && $message['first_name'] != null){
                $displayed_name = $message['first_name'] . " " . $message['last_name'];
            } else {
                $displayed_name = $message['username'];
            } // TODO: Put in separate file
        ?>
            <div class="minichat-message">
                <strong><?= htmlspecialchars($displayed_name); ?></strong> a envoyé le <em><?= ($message['date_creation']); ?></em>:
                <br/>
                <p><?= nl2br(htmlspecialchars($message['message'])) ?></p>
            </div>
        <?php } ?>

        <?php require('pagination.php'); ?>
    </section>

    <?php $main_section = ob_get_clean(); ?>
    <?php require('base.php'); ?>