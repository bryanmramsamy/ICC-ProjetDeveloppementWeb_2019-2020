<?php
$title = "Votre panier";
ob_start();
?>

<section>
    <h1>Panier</h1>

    <?php if ($empty_basket) { ?>
        <h2>Votre panier est vide, mais il n'est pas trop tard pour le remplir.</h2>
        <a>Lien vers boutique</a>
    <?php
    } else {
        $one_purchase = $current_pruchases->fetch();
    ?>
        <div>
            <table style="width:100%">
                <tr>
                    <th>Numéro de commande</th>
                    <th>Utilisateur</th>
                    <th>Prix total de la commande</th>
                </tr>
                <tr>
                    <td>0123456789-<?= $one_pruchases['orderID']; ?></td>
                    <td><?= $_SESSION['username']; ?></td>
                    <td><?= $one_pruchases['total']; ?></td>
                </tr>
            </table> 
        </div>

        <table style="width:100%">
            <tr>
                <th>Nom de l'article</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Prix total</th>
                <th>Quantité</th>
            </tr>
            <tr>
                <td><?= $one_pruchases['name'] ?></td>
                <td>Smith</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Eve</td>
                <td>Jackson</td>
                <td>94</td>
            </tr>
        </table> 





    <?php } ?>
