<?php

switch ($_GET['signal_post_messageVisibility']) {
    case 'succeed':
        $signal_post_messageVisibility_message = "La visibilité du message a été modifiée avec succès";
        $alert = "success";
        break;
    
    case 'failed':
        $signal_post_messageVisibility_message = "La visibilité du message n'a pas pu être modifier";
        $alert = "danger";
        break;
}

check_signal($signal_post_messageVisibility_message, $alert);
