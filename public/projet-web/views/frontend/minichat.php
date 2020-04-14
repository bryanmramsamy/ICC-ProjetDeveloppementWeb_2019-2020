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

    <div id="pagination">
        <?php
            if ($actual_page > 1) echo("<a href='index.php?action=minichat&page=1'>&lt;&lt;&lt; PREMIÈRE PAGE</a> | <a href='index.php?action=minichat&page=" . $previous_page . "'>&lt; PAGE PRÉCÉDENTE</a> | ");
            echo ("PAGE " . $actual_page . " SUR " . $total_pages);
            if ($actual_page < $total_pages) echo(" | <a href='index.php?action=minichat&page=" . $next_page . "'>PAGE SUIVANTE &gt;</a> | <a href='index.php?action=minichat&page=" . $total_pages . "'>DERNIÈRE PAGE &gt;&gt;&gt; </a>");
        ?>
    </div>
</section>

<?php $main_section = ob_get_clean(); ?>
<?php require('base.php'); ?>