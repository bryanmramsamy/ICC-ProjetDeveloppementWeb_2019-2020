<?php

switch ($_GET['signal_post_articleUpdate']) {
    case 'created':
        $signal_post_articleUpdate_message = "L'article a été modifié avec succès";
        $alert = "success";
        break;
    
    case 'failed':
        $signal_post_articleUpdate_message = "L'article n'a pas pu être modifié";
        $alert = "danger";
        break;
}

check_signal($signal_post_articleUpdate_message, $alert);
