<?php
if ($_SESSION['user_role_lvl'] < PERMISSION['user']) header('Location: index.php?action=forbidden');

$title = "Mini-Chat | Page " . $actual_page;
ob_start();
?>

<section>
    <?php require('views/minichat/minichat_CreateView.php'); ?>
</section>

<section>
    <?php
    require('views/static/pagination.php');

    while ($message = $messages->fetch()){ 
        if (checkPermissions('modo', false) || $message['is_visible']) {
            $displayed_name = displayed_name($message['username'], $message['first_name'], $message['last_name']);
            $bg_color = $message['is_visible'] ? "dark" : "danger";
    ?>

            <div class="alert alert-<?= $bg_color; ?>">
                <h5 class="mb-0"><?= nl2br(htmlspecialchars($message['message'])) ?></h5>
                <hr>
                <p class="mb-0">Envoyé le <em><?= ($message['date_creation']); ?></em> <?php if ($message['date_edition'] != $message['date_creation']) echo("et édité le <em>" . $message['date_edition']) . "</em>"; ?> par <strong><?= htmlspecialchars($displayed_name); ?></strong><p>

                <div class="text-right">
                    <?php require('views/minichat/minichat_admin_options.php') ?>
                    <a class="btn btn-secondary" href="#">Signaler le commentaire</a><!-- TODO: Add flag option -->
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
