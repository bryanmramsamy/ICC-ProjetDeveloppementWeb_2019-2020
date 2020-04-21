<?php

switch ($_GET['signal_post_postUpdate']) {
    case 'updated':
        $signal_post_postUpdate_message = "Le billet a été modifié avec succès";
        $alert = "success";
        break;

    case 'failed':
        $signal_post_postUpdate_message = "Le billet n'a pas pu être modifier. Veuillez réésayer.";
        $alert = "danger";
        break;
}

check_signal($signal_post_postUpdate_message, $alert);
