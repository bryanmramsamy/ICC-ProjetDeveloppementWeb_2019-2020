<?php

switch ($_GET['signal_post_profileUpdate']) {
    case 'updated':
        $signal_post_profileUpdate_message = "Le profile de l'utilisateur a bien été mis à jour";
        $alert = "success";
        break;

    case 'failed':
        $signal_post_profileUpdate_message = "Le profile de l'utilisateur n'a pas pu être mis à jour";
        $alert = "danger";
        break;
    
    case 'unknown_user':
        $signal_post_profileUpdate_message = "Utilisateur inconnu. Veuillez réessayer";
        $alert = "warning";
        break;
}

check_signal($signal_post_profileUpdate_message, $alert);
