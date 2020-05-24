<?php

switch ($_GET['signal_post_remove_from_basket']) {
    case 'succeeded':
        $signal_post_remove_from_basket_message = "L'article correctement été retiré du panier";
        $alert = "success";
        break;

    case 'no_order':
        $signal_post_remove_from_basket_message = "Vous ne pouvez pas retirer d'article de votre panier lorsque celui-ci est vide";
        $alert = "warning";
        break;

    case 'failed':
        $signal_post_remove_from_basket_message = "L'article n'a pas pu être retiré de votre panier !";
        $alert = "danger";
        break;

    case 'invalid_purchaseID':
        $signal_post_remove_from_basket_message = "L'article à retirer du panier n'est pas reconnu !";
        $alert = "danger";
        break;
}

check_signal($signal_post_remove_from_basket_message, $alert);
