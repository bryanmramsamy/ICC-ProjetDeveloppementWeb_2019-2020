<?php
$title = "Détails de la commande: XXXX-XXXX" . $order['id'];
ob_start();
?>

<section>
    <h1>Détails de la commande XXXX-XXXX<?= $order['id']; ?></h1>
    <div>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Numéro de commande</th>
                    <th>Date de commande</th>
                    <th>Date de paiement</th>
                    <th>Utilisateur</th>
                    <th>Nombre total d'article</th>
                    <th>Prix total de la commande</th>
                    <th>Numéro de compte</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>XXXX-XXXX<?= $order['id']; ?></td>
                    <td><?= $order['date_ordered']; ?></td>
                    <td><?= $order['date_payed'] ?></td>
                    <td><?= displayed_name($user['username'], $user['first_name'], $user['last_name']) ?></td>
                    <td><?= $number_items ?></td>
                    <td>€ <?= number_format((float)$order['total'], 2, ',', ''); ?></td>
                    <td><?= $order['bank_account']; ?></td>
                </tr>
            </tbody>
        </table> 
    </div>

    <br>

    <table class="table table-sm table-hover table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nom de l'article</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($purchase = $purchases->fetch()) { ?>
                <tr>
                    <td><?= $purchase['name']; ?></td>
                    <td class="text-center"><?= $purchase['quantity']; ?></td>
                    <td class="text-right">€ <?= number_format((float)$purchase['unit_price'], 2, ',', ''); ?></td>
                    <td class="text-right">€ <?= number_format((float)$purchase['total_price'], 2, ',', ''); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br>
    <div class="text-right">
        <a class="btn btn-secondary" href="index.php?action=profile&userID=<?= $user['id']; ?>#users_orders">Retourner voir les commandes de <?= displayed_name($user['username'], $user['first_name'], $user['last_name']) ?></a>
    </div>



<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
