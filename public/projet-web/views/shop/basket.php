<?php
$title = "Votre panier";
ob_start();
?>

<section>
    <h1>Panier</h1>

    <?php if ($empty_basket) { ?>
        <h2>Votre panier est vide, mais il n'est pas trop tard pour le remplir.</h2>
        <a>Lien vers boutique</a>
    <?php } else { ?>
        <div>
            <table style="width:100%; border-style: solid;">
                <tr>
                    <th>Numéro de commande</th>
                    <th>Utilisateur</th>
                    <th>Prix total de la commande</th>
                </tr>
                <tr>
                    <td>0123456789-<?= $order['id']; ?></td>
                    <td><?= $_SESSION['username']; ?></td>
                    <td>€ <?= number_format((float)$order['total'], 2, ',', ''); ?></td>
                </tr>
            </table> 
        </div>

        <br>

        <table style="width:100%">
            <tr>
                <th>Nom de l'article</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Prix total</th>
            </tr>
            <?php while ($purchase = $purchases->fetch()) { ?>
                <tr>
                    <td><?= $purchase['name']; ?></td>
                    <td><?= $purchase['quantity']; ?></td>
                    <td>€ <?= number_format((float)$purchase['unit_price'], 2, ',', ''); ?></td>
                    <td>€ <?= number_format((float)$purchase['total_price'], 2, ',', ''); ?></td>
                </tr>
            <?php } ?>
        </table> 





    <?php } ?>
