<?php

switch ($_GET['signal_post_order_cancel']) {
    case 'succeeded':
        $signal_post_order_cancel = "Votre panier a été vidé avec succès";
        $alert = "success";
        break;

    case 'failed':
        $signal_post_order_cancel = "Votre panier n'a pas pu être vidé";
        $alert = "danger";
        break;
}

check_signal($signal_post_order_cancel, $alert);
