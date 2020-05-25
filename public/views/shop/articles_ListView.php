<?php
$title = "Boutique | Page " . $actual_page;
ob_start();

if (checkPermissions('modo', false)){
?>

<section class="pb-2">
    <div class="row">
        <div class="col"><a class="btn btn-info btn-lg btn-block" href="index.php?action=shop_article_create">Ajouter un article</a></div>
        <div class="col"><a class="btn btn-info btn-lg btn-block" href="index.php?action=shop_category_create">Ajouter une catégorie</a></div>
    </div>
</section>

<?php } ?>

<section>
    <?php
    require('views/static/pagination.php');
    echo "<h1>" . $categorie . "</h1>";

    while ($article = $articles->fetch()){
        if ((empty($category) || $article['categorieID'] == $category) && ($article['availability'] || checkPermissions('modo', false))) {
            $bg_color = $article['availability'] ? "dark" : "danger";
    ?>
        <div class="alert alert-<?= $bg_color; ?>">
            <h4 class="alert-heading d-flex justify-content-center"><?= htmlspecialchars($article['article_name']) ?></h4>
            <div class="text-center"><a href="index.php?action=shop&category=<?= $article['categorieID']; ?>" class="badge badge-pill badge-secondary"><?= htmlspecialchars($article['categorie_name']) ?></a></div>
            <p class="text-justify"><?= nl2br(htmlspecialchars(truncate($article['description']))) ?></p>
            
            <hr>

            <div class="row text-center h5">
                <div class="col border border-secondary rounded p-1 mx-2">
                    Quantité restante: <?= htmlspecialchars($article['quantity_left']) ?>
                </div>
                <div class="col border border-secondary rounded p-1 mx-2">
                    Prix unitaire: € <?= number_format((float)htmlspecialchars($article['unit_price']), 2, ',', '') ?>
                </div>
            </div>

            <div class="text-right">
                <?php require('views/shop/article_admin_options.php') ?>
                <a class="btn btn-primary" href="index.php?action=shop_article&articleID=<?= $article['id'] ?>">Voir plus...</a>
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
