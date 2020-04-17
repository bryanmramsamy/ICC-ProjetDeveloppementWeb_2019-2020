<?php
if ($_SESSION['user_role_lvl'] < 10) header('Location: index.php?action=forbidden');

$title = "Mini-Chat | Page " . $actual_page;

ob_start();
?>

<section id="before_minichat">
    <?php 
    require('views/signals/signal_post_messageCreation.php');
    require('views/minichat/minichat_CreateView.php');
    ?>
</section>

<section id="minichat">

    <?php
    while ($message = $messages->fetch()){ 
        $displayed_name = displayed_name($message['username'], $message['first_name'], $message['last_name']);
    ?>

        <div class="minichat_message">
            <strong><?= htmlspecialchars($displayed_name); ?></strong> a envoyé le <em><?= ($message['date_creation']); ?></em>:
            <br/>
            <p><?= nl2br(htmlspecialchars($message['message'])) ?></p>
        </div>

    <?php } ?>

    <?php require('views/static/pagination.php'); ?>

</section>

<?php $main_section = ob_get_clean();

require('views/static/base.php'); ?>
