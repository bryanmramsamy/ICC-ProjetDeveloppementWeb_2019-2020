<?php

switch ($_GET['signal_post_add_to_basket']) {
    case 'succeeded':
        $signal_post_add_to_basket_message = "L'article a correctement été ajouté au panier";
        $alert = "success";
        break;

    case 'invalid_quantity':
        $signal_post_add_to_basket_message = "La quantité demandée n'est pas valide";
        $alert = "warning";
        break;

    case 'invalid_article':
        $signal_post_add_to_basket_message = "L'article demandé n'est pas valide";
        $alert = "warning";
        break;

    case 'failed_purchase_creation':
        $signal_post_add_to_basket_message = "L'article n'a pas pu être ajouté au panier";
        $alert = "danger";
        break;
    
    case 'failed_order_creation':
        $signal_post_add_to_basket_message = "La commande n'a pas pu être créé";
        $alert = "danger";
        break;

    case 'failed_order_total_update':
        $signal_post_add_to_basket_message = "Le prix total de la commande n'a pas pu être mis à jour";
        $alert = "danger";
        break;
}

check_signal($signal_post_add_to_basket_message, $alert);
