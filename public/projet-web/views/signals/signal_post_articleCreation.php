<?php

switch ($_GET['signal_post_articleCreation']) {
    case 'created':
        $signal_post_articleCreation_message = "Le nouvel article a été créé avec succès";
        $alert = "success";
        break;
    
    case 'failed':
        $signal_post_articleCreation_message = "Le nouvel article n'a pas être créer";
        $alert = "danger";
        break;
}

check_signal($signal_post_articleCreation_message, $alert);
