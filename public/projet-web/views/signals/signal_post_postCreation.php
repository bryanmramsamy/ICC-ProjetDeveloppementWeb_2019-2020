<?php

switch ($_GET['signal_post_postCreation']) {
    case 'created':
        $signal_post_postCreation_message = "Le billet a été créé avec succès";
        $alert = "success";
        break;

    case 'failed':
        $signal_post_postCreation_message = "Le billet n'a pas pu être créé. Veuillez réésayer.";
        $alert = "danger";
        break;
    
    case 'invalid':
        $signal_post_postCreation_message = "Un titre et un contenu est requis pour la création d'un billet";
        $alert = "warning";
        break;
}

check_signal($signal_post_postCreation_message, $alert);
