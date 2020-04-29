<?php
if ($_SESSION['user_role_lvl'] < PERMISSION['user']) header('Location: index.php?action=forbidden');

$title = "Mini-Chat | Page " . $actual_page;

ob_start();
?>

<section id="minichat_CreateView">
    <?php require('views/minichat/minichat_CreateView.php'); ?>
</section>

<section id="minichat">

    <?php
    while ($message = $messages->fetch()){ 
        $displayed_name = displayed_name($message['username'], $message['first_name'], $message['last_name']);
    ?>

        <div class="alert alert-dark" role="alert">
            <h4 class="alert-heading"><?= nl2br(htmlspecialchars($message['message'])) ?></h4>
            <p><?= htmlspecialchars($displayed_name); ?></p>
            <hr>
            <p class="mb-0">Envoyé le <em><?= ($message['date_creation']); ?></p>
        </div>

    <?php
    }
    
    require('views/static/pagination.php');
    ?>

</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
