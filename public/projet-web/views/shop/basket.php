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

        <div class="row">
            <div class="col">
                <a class="col btn btn-primary btn-lg btn-block" href="index.php?action=checkout">Confirmer la commande</a>
            </div>
            <div class="col">
                <a class="col btn btn-secondary btn-lg btn-block" href="index.php?action=cancel_order">Annuler la commande</a>
            </div>
        </div>

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
                        <td class="text-center"><?= $purchase['quantity']; ?></td>
                        <td class="text-right">€ <?= number_format((float)$purchase['unit_price'], 2, ',', ''); ?></td>
                        <td class="text-right">€ <?= number_format((float)$purchase['total_price'], 2, ',', ''); ?></td>
                        <td class="text-center"><a class="btn-sm btn-block btn-secondary btn-outline-warning" href="index.php?action=shop_remove_from_basket_post&purchaseID=<?= $purchase['purchaseID']; ?>">
                            <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                            </svg>
                        </a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table> 
    <?php } ?>

    <?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
