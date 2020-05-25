<?php

switch ($_GET['signal_post_payment']) {
    case 'succeeded':
        $signal_post_payment = "Le paiement de votre achat a été validé avec succes";
        $alert = "success";
        break;

    case 'failed':
        $signal_post_payment = "Le paiement de votre achat a échoué !";
        $alert = "danger";
        break;
}

check_signal($signal_post_payment, $alert);
