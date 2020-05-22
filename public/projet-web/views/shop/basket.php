<?php
$title = "Votre panier";
ob_start();
?>

<section>
    <h1>Panier</h1>

    <?php if ($empty_basket) { ?>
        <h2>Votre panier est vide, mais il n'est pas trop tard pour le remplir.</h2>
        <br>
        <a class="btn btn-primary btn-lg btn-block" href="index.php?action=shop">Visiter notre boutique</a>
    <?php } else { ?>
        <div>
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Numéro de commande</th>
                        <th>Utilisateur</th>
                        <th>Nombre total d'article</th>
                        <th>Prix total de la commande</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>XXXX-XXXX<?= $order['id']; ?></td>
                        <td><?= $_SESSION['username']; ?></td>
                        <td><?= $number_items ?></td>
                        <td>€ <?= number_format((float)$order['total'], 2, ',', ''); ?></td>
                    </tr>
                </tbody>
            </table> 
        </div>

        <br>

        <a class="btn btn-primary btn-lg btn-block" href="index.php?action=checkout">Confirmer la commande</a>

        <br>

        <table class="table table-sm table-hover table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nom de l'article</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Prix total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($purchase = $purchases->fetch()) { ?>
                    <tr>
                        <td><?= $purchase['name']; ?></td>
                        <td><?= $purchase['quantity']; ?></td>
                        <td>€ <?= number_format((float)$purchase['unit_price'], 2, ',', ''); ?></td>
                        <td>€ <?= number_format((float)$purchase['total_price'], 2, ',', ''); ?></td>
                        <td><a class="btn btn-warning" href="index.php?action=shop_remove_from_basket_post&purchaseID=<?= $purchase['purchaseID']; ?>">Supprimer l'entrée</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table> 
    <?php } ?>

    <?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
