<?php
$title = "Boutique | Page " . $actual_page;
ob_start();

if (checkPermissions('modo', false)){
?>

<section class="pb-2">
    <a class="btn btn-info btn-lg btn-block" href="index.php?action=article_create">Ajouter un article</a>
</section>

<?php } ?>

<section>
    <?php
    require('views/static/pagination.php');

    while ($article = $articles->fetch()){
        if ($article['availibility'] || checkPermissions('modo', false)) {
            $bg_color = $article['availibility'] ? "dark" : "danger";
    ?>
        <div class="alert alert-<?= $bg_color; ?>">
            <h4 class="alert-heading d-flex justify-content-center"><?= htmlspecialchars($article['article_name']) ?></h4>
            <hr>
            <div><?= htmlspecialchars($article['categorie_name']) ?></div>
            <hr>
            <div><?= htmlspecialchars($article['unit_price']) ?></div>
            <div><?= htmlspecialchars($article['quantity_left']) ?></div>

            <div class="text-right">
                <?php // require('views/articles/article_admin_options.php') ?>
                <a class="btn btn-primary" href="index.php?action=article&articleID=<?= $article['articleID'] ?>">Voir plus...</a>
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
