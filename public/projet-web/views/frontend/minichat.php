<?php $title = "Mini-Chat"; ?>

<?php ob_start(); ?>

<section id="minichat">

    <?php while ($message = $messages->fetch()){ ?>
        <div class="minichat-message">
            <strong><?= htmlspecialchars($message['username']); ?></strong> a envoyé le <em><?= ($message['date_creation']); ?></em>:
            <br/>
            <p><?= nl2br(htmlspecialchars($message['message'])) ?></p>
        </div>
    <?php } ?>

</section>

<?php $main_section = ob_get_clean(); ?>
<?php require('base.php'); ?>