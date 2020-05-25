<?php

switch ($_GET['signal_post_articleChangeAvailability']) {
    case 'succeeded':
        $signal_post_articleChangeAvailability_msg = "Le statut de disponibilité de l'article a correctement été mis à jour";
        $alert = "success";
        break;
    
    case 'failed':
        $signal_post_articleChangeAvailability_msg = "Le statut de disponibilité de l'article n'a pas pu être mis à jour !";
        $alert = "danger";
        break;

    case 'not_found':
        $signal_post_articleChangeAvailability_msg = "L'article dont la disponibilité doit être changée n'a pas été trouvé !";
        $alert = "warning";
        break;
}

check_signal($signal_post_articleChangeAvailability_msg, $alert);
