<?php
$title = "Paiement de la commande: XXXX-XXXX" . $_SESSION['orderID'];
ob_start();
?>

<section class="container border text-center" style="width: 750px;">
    <h1>Paiement de la commande XXXX-XXXX<?= $_SESSION['orderID']; ?></h1>
    <hr>
    <div>
        <h2>Montant à payer: <strong>€ <?= number_format((float)$orderTotalPrice, 2, ',', ''); ?></strong></h2>
        <hr>
        <h2>Au nom de: <?= $user_display_name; ?></h2>
        <hr>
        <h3>Numéro de compte: <?= $cleaned_bank_account; ?></h3>
    </div>
    <hr>
    <div>
        <a class="col btn btn-success btn-lg btn-block" href="index.php?action=payment_post">Valider le paiement</a>
    </div>

    <br>
</section>

<br>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
