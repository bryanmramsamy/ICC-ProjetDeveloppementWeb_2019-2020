<?php

switch ($_GET['signal_post_postUpdate']) {
    case 'updated':
        $signal_post_postUpdate_msg = "Le billet a été modifié avec succès";
        break;

    case 'failed':
        $signal_post_postUpdate_msg = "Le billet n'a pas pu être modifier. Veuillez réésayer.";
        break;
}

echo ("<div class=signal_post_postUpdate_msg'>" . $signal_post_postUpdate_msg . "</div>");