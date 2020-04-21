<?php

switch ($_GET['signal_post_commentCreation']) {
    case 'created':
        $signal_post_commentCreation_msg = "Votre commentaire a bien été ajouté au billet !";
        $alert = "success";
        break;
    
    case 'failed':
        $signal_post_commentCreation_msg = "Une erreur s'est produite ! Votre commentaire n'a pas pu être ajouté au billet !";
        $alert = "danger";
        break;

    case 'invalid':
        $signal_post_commentCreation_msg = "Veuillez entrer un commentaire !";
        $alert = "warning";
        break;
}

check_signal($signal_post_commentCreation_msg, $alert);
