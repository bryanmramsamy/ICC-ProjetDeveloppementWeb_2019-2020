<?php

switch ($_GET['signal_post_postCreation']) {
    case 'created':
        $signal_post_postCreation_msg = "Le billet a été créé avec succès";
        break;

    case 'failed':
        $signal_post_postCreation_msg = "Le billet n'a pas pu être créé. Veuillez réésayer.";
        break;
    
    case 'invalid':
        $signal_post_postCreation_msg = "Un titre et un contenu est requis pour la création d'un billet";
        break;
}

echo ("<div class=signal_post_postCreation_msg'>" . $signal_post_postCreation_msg . "</div>");