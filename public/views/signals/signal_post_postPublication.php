<?php

switch ($_GET['signal_post_postPublication']) {
    case 'succeed':
        $signal_post_postPublication_message = "La visibilité du billet a été modifiée avec succès !";
        $alert = "success";
        break;
    
    case 'failed':
        $signal_post_postPublication_message = "La visibilité du billet n'a pas pu être modifier. Veuillez réésayer";
        $alert = "danger";
        break;
}

check_signal($signal_post_postPublication_message, $alert);
