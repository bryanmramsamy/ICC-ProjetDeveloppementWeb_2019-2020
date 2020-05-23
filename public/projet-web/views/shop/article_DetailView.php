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
        <div class="text-center"><a href="index.php?action=shop&category=<?= $article['categorieID']; ?>" class="badge badge-pill badge-secondary"><?= htmlspecialchars($category['name']) ?></a></div>
        <p class="text-justify"><?= nl2br(htmlspecialchars($article['description'])) ?></p>

        <hr>

        <div class="row text-center h5">
            <div class="col border border-secondary rounded p-1 mx-2">
                Quantité restante: <?= htmlspecialchars($article['quantity_left']) ?>
            </div>
            <div class="col border border-secondary rounded p-1 mx-2">
                Prix unitaire: € <?= number_format((float)htmlspecialchars($article['unit_price']), 2, ',', '') ?>
            </div>
        </div>

        <div class="d-flex d-inline justify-content-end p-1 m-1">
            <?php 
            if (checkPermissions('user', false)) {
                require('views/shop/article_purchase_form.php');
            }
            require('views/shop/article_admin_options.php');
            ?>
            <a class="btn btn-primary ml-1" href="index.php?action=shop">Revenir à la boutique</a>
        </div>

    </div>
</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
