<?php
if ($_SESSION['user_role_lvl'] < 10) header('Location: index.php?action=forbidden');

$title = "Mini-Chat | Page " . $actual_page;

ob_start();
?>

<section id="minichat_message_create">
    <?php require('minichat_new_message.php'); ?>
    <?php require('signal_post_messageCreation.php'); ?>
</section>

<section id="minichat">

    <?php
    while ($message = $messages->fetch()){ 
        $displayed_name = displayed_name($message['username'], $message['first_name'], $message['last_name']);
    ?>

        <div class="minichat-message">
            <strong><?= htmlspecialchars($displayed_name); ?></strong> a envoyé le <em><?= ($message['date_creation']); ?></em>:
            <br/>
            <p><?= nl2br(htmlspecialchars($message['message'])) ?></p>
        </div>

    <?php } ?>

    <?php require('pagination.php'); ?>

</section>

<?php $main_section = ob_get_clean();

require('base.php'); ?>
