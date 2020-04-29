<?php

switch ($_GET['signal_post_messageUpdate']) {
    case 'updated':
        $signal_post_messageUpdate_message = "Le message a bien été mis à jour";
        $alert = "success";
        break;
    
    case 'failed':
        $signal_post_messageUpdate_message = "Le message n'a pas pu être mis à jour";
        $alert = "danger";
        break;
}

check_signal($signal_post_messageUpdate_message, $alert);
