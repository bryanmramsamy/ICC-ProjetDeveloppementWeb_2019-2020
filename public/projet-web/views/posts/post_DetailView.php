<?php
$title = $post['title'];

ob_start();
?>

<section id="post">

    <?php
    $displayed_name = displayed_name($created_by['username'], $created_by['first_name'], $created_by['last_name']);
    ?>

    <div class="post">

        <strong><?= htmlspecialchars($displayed_name); ?></strong> a envoyé le <em><?= ($post['date_edited']); ?></em>

        <h1><?= htmlspecialchars($post['title']) ?></h1>

        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>

    </div>

</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>