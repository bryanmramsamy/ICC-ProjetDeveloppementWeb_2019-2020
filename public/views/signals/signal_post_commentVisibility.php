<?php

switch ($_GET['signal_post_commentVisibility']) {
    case 'succeed':
        $signal_post_commentVisibility = "La visibilité du commentaire a été modifiée avec succès";
        $alert = "success";
        break;
    
    case 'failed':
        $signal_post_commentVisibility = "La visibilité du commentaire n'a pas pu être modifié";
        $alert = "danger";
        break;
}

check_signal($signal_post_commentVisibility, $alert);
