<?php
$title = $article['name'];
ob_start();
?>

<section>
    <?php
    $bg_color = $article['availability'] ? "dark" : "danger";
    ?>

    <div class="alert alert-<?= $bg_color; ?>">
        <h4 class="alert-heading d-flex justify-content-center"><?= htmlspecialchars($article['name']) ?></h4>
        <div class="text-center"><a href="index.php?action=shop&category=<?= $article['categorieID']; ?>" class="badge badge-pill badge-secondary"><?= htmlspecialchars($article['categorie_name']) ?></a></div>
        <p class="text-justify"><?= nl2br(htmlspecialchars(truncate($article['description']))) ?></p>

        <hr>

        <div class="d-flex justify-content-center">
            <div class="border border-secondary rounded p-1 mx-2">Prix unitaire: <?= htmlspecialchars($article['unit_price']) ?></div>

            <div class="border border-secondary rounded p-1 mx-2">Quantité restante: <?= htmlspecialchars($article['quantity_left']) ?></div>
        </div>
        <div class="text-right">
            <?php require('views/shop/article_admin_options.php') ?>
            <a class="btn btn-primary" href="index.php?action=shop_article&articleID=<?= $article['id'] ?>">Voir plus...</a>
        </div>

    </div>
</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
