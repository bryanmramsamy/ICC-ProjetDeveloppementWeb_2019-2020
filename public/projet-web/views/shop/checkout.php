<?php
$title = "Confirmation de la commande: XXXX-XXXX" . $order['id'];
ob_start();
?>

<section>
    <h1>Confirmation de la commande XXXX-XXXX<?= $order['id']; ?></h1>
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
                    <td><?= displayed_name($_SESSION['username'], $_SESSION['user_first_name'], $_SESSION['user_last_name']) ?></td>
                    <td><?= $number_items ?></td>
                    <td>€ <?= number_format((float)$order['total'], 2, ',', ''); ?></td>
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

<section>
    <form method="post" action="index.php?action=checkout_post&orderID=<?= $_SESSION['orderID']; ?>">
        <div>
            <label for='bank_account'>Numero de compte en banque : </label>
            <input class="form-control" type='text' id='bank_account' name='bank_account' required/>
            <small class="form-text text-muted">La somme sera débitée de votre compte une fois le paiement validé</small>
        </div>

        <hr>

        <div class='row'>
            <div class='col-8 form-group'>
                <label for='delivery_address'>Adresse de livraison : </label>
                <input class="form-control" type='text' id='delivery_address' name='delivery_address' value="<?= $user['address'] ?>" required/>
            </div>

            <div class='col-4 form-group'>
                <label for='zipcode'>Code postal : </label>
                <input class="form-control" type='text' id='zipcode' name='zipcode' value="<?= $user['zipcode'] ?>" required/>
            </div>
        </div>

        <br>

        <div class='row'>
            <div class='col'>
                <div class="alert alert-warning" role="alert">Attention, une fois la commande validée, elle ne pourra plus être annulée !</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input class="btn btn-success btn-lg btn-block" type=submit value="Valider la commande"/>
            </div>
            <div class="col">
                <a class="col btn btn-secondary btn-lg btn-block" href="index.php?action=cancel_order">Annuler la commande</a>
            </div>
            <div class="col">
                <a class="col btn btn-primary btn-lg btn-block" href="index.php?action=basket">Modifier votre panier</a>
            </div>
        </div>
    </form>
    <br>
</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
